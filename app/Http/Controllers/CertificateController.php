<?php

namespace PMEexport\Http\Controllers;

use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Facades\Excel;
use PMEexport\Exports\CertificatesExport;
use PMEexport\Http\Requests\CreateCertificateRequest;
use PMEexport\Http\Requests\UpdateCertificateRequest;
use PMEexport\Models\Certificate;
use PMEexport\Models\CertificateRequirement;
use PMEexport\Repositories\CertificateCategoryRepository;
use PMEexport\Repositories\CertificateRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use PMEexport\Repositories\CertificateRequirementRepository;
use PMEexport\Repositories\CompanyCertificateRepository;
use PMEexport\Repositories\DepartmentRepository;
use PMEexport\Repositories\RequirementRepository;
use PMEexport\Services\CertificateService;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CertificateController extends AppBaseController
{
    /** @var  CertificateRepository */
    private $certificateRepository;
    /**
     * @var CertificateCategoryRepository
     */
    private $certificateCategoryRepository;
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;
    /**
     * @var RequirementRepository
     */
    private $requirementRepository;
    /**
     * @var CertificateRequirementRepository
     */
    private $certificateRequirementRepository;
    /**
     * @var CertificateService
     */
    private $certificateService;
    private $companyCertificateRepository;

    public function __construct(CompanyCertificateRepository $companyCertificateRepository,
                                CertificateRepository $certificateRepo,
                                CertificateCategoryRepository $certificateCategoryRepository,
                                DepartmentRepository $departmentRepository,
                                RequirementRepository $requirementRepository,
                                CertificateRequirementRepository $certificateRequirementRepository,
                                CertificateService $certificateService)
    {
        $this->companyCertificateRepository = $companyCertificateRepository;
        $this->certificateRepository = $certificateRepo;
        $this->certificateCategoryRepository = $certificateCategoryRepository;
        $this->departmentRepository = $departmentRepository;
        $this->requirementRepository = $requirementRepository;
        $this->certificateRequirementRepository = $certificateRequirementRepository;
        $this->certificateService = $certificateService;

    }

    /**
     * Display a listing of the Certificate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $this->certificateRepository->pushCriteria(new RequestCriteria($request));
        $certificates = $this->certificateRepository->all();

        return view('certificates.index')
            ->with('certificates', $certificates);
    }

    public function indexCompany(Request $request)
    {
        return $this->certificateService->showIndexCompany($request);
    }

    /**
     * Show the form for creating a new Certificate.
     *
     * @return Response
     */
    public function create()
    {
        $listDepartments = $this->departmentRepository->all();
        $listCategories = $this->certificateCategoryRepository->all();
        $listRequirements = $this->requirementRepository->all();

        $certificate = new Certificate();
        $certificate->status = 1;

        return view('certificates.create')->with([
            'listDepartments' => $listDepartments,
            'certificate' => $certificate,
            'listCategories' => $listCategories,
            'listRequirements' => $listRequirements]);
    }

    /**
     * Store a newly created Certificate in storage.
     *
     * @param CreateCertificateRequest $request
     *
     * @return Response
     */
    public function store(CreateCertificateRequest $request)
    {
        $input = $request->except("requirements");

        $certificate = $this->certificateRepository->create($input);

        if($request->input('requirements')) {
            foreach ($request->input('requirements') as $requirement) {
                $array = array(
                    'certificate_id' => $certificate->id,
                    'requirement_id' => $requirement
                );
                $this->certificateRequirementRepository->create($array);
            }
        }

        Flash::success('Certificado criado com sucesso.');

        return redirect(route('certificates.index'));
    }

    /**
     * Display the specified Certificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Certificate $certificate)
    {
//        $certificate = $this->certificateRepository->find($id);

        if (empty($certificate)) {
            Flash::error('Certificado não encontrado');

            return redirect(route('certificates.index'));
        }

        return view('certificates.show')->with('certificate', $certificate);
    }

    /**
     * Show the form for editing the specified Certificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Certificate $certificate)
    {
//        $certificate = $this->certificateRepository->find($id);

        if (empty($certificate)) {
            Flash::error('Certificado não encontrado');
            return redirect(route('certificates.index'));
        }

        $listDepartments = $this->departmentRepository->all();
        $listCategories = $this->certificateCategoryRepository->all();
        $listRequirements = $this->requirementRepository->all();

        $requirements = $this->certificateRequirementRepository->findWhere(['certificate_id' => $certificate->id])->all();

        $selectedsRequirements = array();

        foreach ($requirements as $requirement){
            $selectedsRequirements[] = $requirement->requirement_id;
        }

        return view('certificates.edit')->with('certificate', $certificate)->with(['listDepartments' => $listDepartments, 'listCategories' => $listCategories, 'listRequirements' => $listRequirements, 'selectedsRequirements' => $selectedsRequirements]);
    }

    /**
     * Update the specified Certificate in storage.
     *
     * @param  int              $id
     * @param UpdateCertificateRequest $request
     *
     * @return Response
     */
    public function update(Certificate $certificate, UpdateCertificateRequest $request)
    {
//        $certificate = $this->certificateRepository->find($id);

        if (empty($certificate)) {
            Flash::error('Certificado não encontrado');

            return redirect(route('certificates.index'));
        }

        $input = $request->except("requirements");

        $certificate = $this->certificateRepository->update($input, $certificate->id);

        $exigencias = $this->certificateRequirementRepository->findWhere(['certificate_id' => $certificate->id]);

        if($exigencias->count()) {
            foreach ($exigencias as $exigencia) {
                $exigencia->forceDelete();
            }
        }

        if($request->input('requirements')) {
            foreach ($request->input('requirements') as $requirement) {
                $array = array(
                    'certificate_id' => $certificate->id,
                    'requirement_id' => $requirement
                );
                $this->certificateRequirementRepository->create($array);
            }
        }

        Flash::success('Certificado atualizado com sucesso.');

        return redirect(route('certificates.index'));
    }

    /**
     * Remove the specified Certificate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Certificate $certificate)
    {
//        $certificate = $this->certificateRepository->find($id);

        if (empty($certificate)) {
            Flash::error('Certificado não encontrado');

            return redirect(route('certificates.index'));
        }

        $checkCertificateUse = $this->companyCertificateRepository->findWhere(['id'=>$certificate->id])->first();

        if($checkCertificateUse) {
            Flash::error('Certificado esta sendo utilizado');
            return redirect(route('certificates.index'));
        }

        $exigencias = $this->certificateRequirementRepository->findWhere(['certificate_id' => $certificate->id]);

        if($exigencias->count()) {
            foreach ($exigencias as $exigencia) {
                $exigencia->forceDelete();
            }
        }

        $certificate->delete();

        Flash::success('Certificado deletado com sucesso.');

        return redirect(route('certificates.index'));
    }

    public function requestCertificate(Certificate $certificate)
    {
        return $this->certificateService->showRequestCertificate($certificate);
    }

    public function storeRequestCertificate(Request $request)
    {
        return $this->certificateService->storeRequestCertificate($request);
    }

    public function sendMessageRequestCertificate(Request $request)
    {
        return $this->certificateService->sendMessageRequestCertificate($request);
    }

    public function certificatesFromCompany(Request $request)
    {
        return $this->certificateService->showCertificatesFromCompany($request);
    }

    public function showCertificateToCompany($id)
    {
        return $this->certificateService->showCertificateToCompany($id);
    }

    public function imprimir($id)
    {
        return $this->certificateService->imprimir($id);
    }

    public function export()
    {
        return Excel::download(new CertificatesExport(),
            'certificate.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
