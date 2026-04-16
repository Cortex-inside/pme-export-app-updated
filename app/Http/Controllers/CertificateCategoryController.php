<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCertificateCategoryRequest;
use PMEexport\Http\Requests\UpdateCertificateCategoryRequest;
use PMEexport\Models\CertificateCategory;
use PMEexport\Repositories\CertificateCategoryRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Repositories\CertificateRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CertificateCategoryController extends AppBaseController
{
    /** @var  CertificateCategoryRepository */
    private $certificateCategoryRepository;
    /**
     * @var CertificateRepository
     */
    private $certificateRepository;

    public function __construct(CertificateCategoryRepository $certificateCategoryRepo, CertificateRepository $certificateRepository)
    {
        $this->certificateCategoryRepository = $certificateCategoryRepo;
        $this->certificateRepository = $certificateRepository;
    }

    /**
     * Display a listing of the CertificateCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->certificateCategoryRepository->pushCriteria(new RequestCriteria($request));
        $certificateCategories = $this->certificateCategoryRepository->paginate();

        return view('certificate_categories.index')
            ->with('certificateCategories', $certificateCategories);
    }

    /**
     * Show the form for creating a new CertificateCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('certificate_categories.create');
    }

    /**
     * Store a newly created CertificateCategory in storage.
     *
     * @param CreateCertificateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCertificateCategoryRequest $request)
    {
        $input = $request->all();

        $certificateCategory = $this->certificateCategoryRepository->create($input);

        Flash::success('Categoria de certificado criado com sucesso.');

        return redirect(route('certificateCategories.index'));
    }

    /**
     * Display the specified CertificateCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(CertificateCategory $certificateCategory)
    {
        if (empty($certificateCategory)) {
            Flash::error('Categoria de certificado não encontrada');

            return redirect(route('certificateCategories.index'));
        }

        return view('certificate_categories.show')->with('certificateCategory', $certificateCategory);
    }

    /**
     * Show the form for editing the specified CertificateCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(CertificateCategory $certificateCategory)
    {
        if (empty($certificateCategory)) {
            Flash::error('Categoria de certificado não encontrada');

            return redirect(route('certificateCategories.index'));
        }

        return view('certificate_categories.edit')->with('certificateCategory', $certificateCategory);
    }

    /**
     * Update the specified CertificateCategory in storage.
     *
     * @param  int              $id
     * @param UpdateCertificateCategoryRequest $request
     *
     * @return Response
     */
    public function update(CertificateCategory $certificateCategory, UpdateCertificateCategoryRequest $request)
    {
        if (empty($certificateCategory)) {
            Flash::error('Categoria de certificado não encontrada');

            return redirect(route('certificateCategories.index'));
        }

        $certificateCategory = $this->certificateCategoryRepository->update($request->all(), $certificateCategory->id);

        Flash::success('Categoria de certificado atualizado com sucesso.');

        return redirect(route('certificateCategories.index'));
    }

    /**
     * Remove the specified CertificateCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(CertificateCategory $certificateCategory)
    {

        if (empty($certificateCategory)) {
            Flash::error('Categoria de certificado não encontrada');

            return redirect(route('certificateCategories.index'));
        }

        $certificados = $this->certificateRepository->findWhere(['certificate_category_id'=>$certificateCategory->id])->first();

        if($certificados) {
            Flash::error('Categoria esta sendo utilizada no certificado: ' . $certificados->name);

            return redirect(route('certificateCategories.index'));
        }

        $this->certificateCategoryRepository->delete($certificateCategory->id);

        Flash::success('Categoria de certificado deletado com sucesso.');

        return redirect(route('certificateCategories.index'));
    }
}
