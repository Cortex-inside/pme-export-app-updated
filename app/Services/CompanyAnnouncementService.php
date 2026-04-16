<?php

/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 19/08/2018
 * Time: 20:11
 */

namespace PMEexport\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use PMEexport\Criteria\AnnouncementByCompanyCriteria;
use PMEexport\Repositories\AnnouncementCompanieRepository;
use PMEexport\Repositories\AnnouncementImageRepository;
use PMEexport\Repositories\CompanyAnnouncementRepository;
use PMEexport\Repositories\ProductCategoryRepository;
use PMEexport\Repositories\AnnouncementDocumentRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Str;

class CompanyAnnouncementService
{

    /**
     * @var CompanyAnnouncementRepository
     */
    private $announcementRepository;
    /**
     * @var AnnouncementDocumentRepository
     */
    private $announcementDocumentRepository;
    /**
     * @var AnnouncementImageRepository
     */
    private $announcementImageRepository;
    /**
     * @var AnnouncementCompanieRepository
     */
    private $announcementCompanieRepository;
    /**
     * @var ProductCategoryService
     */
    private $productCategoryService;

    public function __construct(
        CompanyAnnouncementRepository $announcementRepository,
        AnnouncementDocumentRepository $announcementDocumentRepository,
        AnnouncementImageRepository $announcementImageRepository,
        AnnouncementCompanieRepository $announcementCompanieRepository,
        ProductCategoryService $productCategoryService
    ) {

        $this->announcementRepository = $announcementRepository;
        $this->announcementDocumentRepository = $announcementDocumentRepository;
        $this->announcementImageRepository = $announcementImageRepository;
        $this->announcementCompanieRepository = $announcementCompanieRepository;
        $this->productCategoryService = $productCategoryService;
    }

    public function showAnnouncementsByCompany($request)
    {
        $this->announcementRepository->pushCriteria(new AnnouncementByCompanyCriteria());
        $this->announcementRepository->pushCriteria(new RequestCriteria($request));

        $announcements = $this->announcementRepository->paginate();

        return view('company_announcements.index_by_company')
            ->with('announcements', $announcements);
    }

    public function addNewAnnouncement($companyAnnouncementRequest)
    {
        $data = $companyAnnouncementRequest->all();
        $visibility = $companyAnnouncementRequest->input("visibility");

        $companyId = Auth::user()->company_id;

        $data['company_id'] = $companyId;
        $data["price"] = str_replace(",", "", $data["price"]);

        $companyAnnouncement = $this->announcementRepository->create($data);
        $companyAnnouncementId = $companyAnnouncement->id;

        if ($companyAnnouncementId && $visibility == 1) {
            foreach ($data['company_ids'] as $company_id) {
                $this->announcementCompanieRepository->create([
                    'company_announcement_id' => $companyAnnouncementId,
                    'companie_id' => $company_id
                ]);
            }
        }

        // upload das imagens
        if (isset($data['filename']) && count($data['filename']) > 0) {
            $array_fotos = $data['filename'];

            foreach ($array_fotos as $file) {

                $s3Client = Storage::disk('s3');

                $name = (string) Str::uuid() . "." . $file->getClientOriginalExtension();
                $nameOriginal = $file->getClientOriginalName();
                $filePath = '/announcements/docs/' . $companyAnnouncementId . "/" . $name;
                $s3Client->put($filePath, file_get_contents($file));
                $url = $s3Client->url($filePath);

                // cria registro da foto
                if (!empty($url)) {
                    $this->announcementDocumentRepository->create([
                        'user_id' => Auth::user()->id,
                        'company_announcement_id' => $companyAnnouncementId,
                        'name' => null,
                        'type' => 1,
                        'text' => "",
                        'original_name' => $nameOriginal,
                        'url' => $url
                    ]);
                }
            }
        }

        // upload das imagens
        if (isset($data['imagens']) && count($data['imagens']) > 0) {
            $array_images = $data['imagens'];

            foreach ($array_images as $file) {

                $s3Client = Storage::disk('s3');

                $name = (string) Str::uuid() . "." . $file->getClientOriginalExtension();
                $nameOriginal = $file->getClientOriginalName();
                $filePath = '/announcements/imagens_galery/' . $companyAnnouncementId . "/" . $name;
                $s3Client->put($filePath, file_get_contents($file));
                $url = $s3Client->url($filePath);

                // cria registro da foto
                if (!empty($url)) {
                    $this->announcementImageRepository->create([
                        'user_id' => Auth::user()->id,
                        'company_announcement_id' => $companyAnnouncementId,
                        'name' => "",
                        'type' => 1,
                        'text' => "",
                        'original_name' => $nameOriginal,
                        'url' => $url
                    ]);
                }
            }
        }


        return redirect()->route('sysCompany.companyAnnouncements.indexByCompany')->with('message', 'Anúncio criado com sucesso!.');
    }

    public function destroy($announcement)
    {
        //        $announcement = $this->announcementRepository->findWhere(["uuid"=>$announcement->uuid]);

        if (empty($announcement)) {
            Flash::error('Anuncio não encontrado');

            return redirect(route('sysCompany.companyAnnouncements.indexByCompany'));
        }

        if ($announcement->request_announcements->count()) {
            Flash::error('Existe pedidos relacionados a este anuncio.');

            return redirect(route('sysCompany.companyAnnouncements.indexByCompany'));
        }

        $this->announcementRepository->delete($announcement->id);

        Flash::success('Anuncio deletado com sucesso.');

        return redirect(route('sysCompany.companyAnnouncements.indexByCompany'));
    }

    public function openEditView($id)
    {
        $announcement = $this->announcementRepository->find($id);

        if (empty($announcement)) {
            Flash::error('Anúncio não encontrado.');

            return redirect(route('sysCompany.companyAnnouncements.indexByCompany'));
        }

        $listProductCategory = $this->productCategoryService->getAll();

        return view('company_announcements.edit')->with(['announcement' => $announcement, 'listProductCategory' => $listProductCategory]);
    }

    public function openShowView($announcement)
    {
        //        $announcement = $this->announcementRepository->find($id);

        if (empty($announcement)) {
            Flash::error('Anúncio não encontrado');

            return redirect(route('sysCompany.companyAnnouncements.indexByCompany'));
        }

        return view('company_announcements.show')->with('announcement', $announcement);
    }
}
