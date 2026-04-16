<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Http\Request;
use PMEexport\Models\CompanyAnnouncement;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Repositories\CompanyRepository;
use PMEexport\Services\CompanyAnnouncementService;
use PMEexport\Services\ProductCategoryService;
use PMEexport\Services\ProductService;

class CompanyAnnouncementController extends Controller
{

    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var ProductCategoryService
     */
    private $productCategoryService;
    /**
     * @var CompanyAnnouncementService
     */
    private $companyAnnouncementService;
    private $caeRepository;
    private $companyRepository;

    public function __construct(ProductService $productService,
                                CompanyRepository $companyRepository,
                                ProductCategoryService $productCategoryService,
                                CaeRepository $caeRepository,
                                CompanyAnnouncementService $companyAnnouncementService)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->companyAnnouncementService = $companyAnnouncementService;
        $this->caeRepository = $caeRepository;
        $this->companyRepository = $companyRepository;
    }

    public function indexByCompany(Request $request)
    {
        return $this->companyAnnouncementService->showAnnouncementsByCompany($request);
    }

    public function show(CompanyAnnouncement $announcement)
    {
        return $this->companyAnnouncementService->openShowView($announcement);

    }

    public function create()
    {
        $listProductCategory = $this->productCategoryService->getAll();
        $companys = $this->companyRepository->all();

        $companyAnnouncement = new CompanyAnnouncement();

        return view('company_announcements.create', compact('listProductCategory','companys', 'companyAnnouncement'));
    }

    public function store(Request $companyAnnouncementRequest)
    {

        return $this->companyAnnouncementService->addNewAnnouncement($companyAnnouncementRequest);
    }

    public function getProductByCategoryAjax($id)
    {
        return $this->productService->getByCategoryAjax($id);
    }

    public function edit($id)
    {
        return $this->companyAnnouncementService->openEditView($id);
    }

    /**
     * Update the specified Cae in storage.
     *
     * @param  int              $id
     * @param UpdateCaeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaeRequest $request)
    {
        $cae = $this->caeRepository->find($id);

        if (empty($cae)) {
            Flash::error('Cae not found');

            return redirect(route('caes.index'));
        }

        $cae = $this->caeRepository->update($request->all(), $id);

        Flash::success('Cae updated successfully.');

        return redirect(route('caes.index'));
    }

    public function destroy(CompanyAnnouncement $announcement)
    {
        return $this->companyAnnouncementService->destroy($announcement);
    }
}
