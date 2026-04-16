<?php

namespace PMEexport\Http\Controllers;

use Laracasts\Flash\Flash;
use PMEexport\Http\Requests\CreateRequirementRequest;
use PMEexport\Http\Requests\UpdateRequirementRequest;
use PMEexport\Repositories\CertificateRequirementRepository;
use PMEexport\Repositories\RequirementRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RequirementController extends AppBaseController
{
    /** @var  RequirementRepository */
    private $requirementRepository;
    /**
     * @var CertificateRequirementRepository
     */
    private $certificateRequirementRepository;

    public function __construct(RequirementRepository $requirementRepo, CertificateRequirementRepository $certificateRequirementRepository)
    {
        $this->requirementRepository = $requirementRepo;
        $this->certificateRequirementRepository = $certificateRequirementRepository;
    }

    /**
     * Display a listing of the Requirement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->requirementRepository->pushCriteria(new RequestCriteria($request));
        $requirements = $this->requirementRepository->all();

        return view('requirements.index')
            ->with('requirements', $requirements);
    }

    /**
     * Show the form for creating a new Requirement.
     *
     * @return Response
     */
    public function create()
    {
        return view('requirements.create');
    }

    /**
     * Store a newly created Requirement in storage.
     *
     * @param CreateRequirementRequest $request
     *
     * @return Response
     */
    public function store(CreateRequirementRequest $request)
    {
        $input = $request->all();

        $requirement = $this->requirementRepository->create($input);

        Flash::success('Exigencia criada com sucesso.');

        return redirect(route('requirements.index'));
    }

    /**
     * Display the specified Requirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requirement = $this->requirementRepository->find($id);

        if (empty($requirement)) {
            Flash::error('Exigencia não encontrada');

            return redirect(route('requirements.index'));
        }

        return view('requirements.show')->with('requirement', $requirement);
    }

    /**
     * Show the form for editing the specified Requirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requirement = $this->requirementRepository->find($id);

        if (empty($requirement)) {
            Flash::error('Exigencia não encontrada');

            return redirect(route('requirements.index'));
        }

        return view('requirements.edit')->with('requirement', $requirement);
    }

    /**
     * Update the specified Requirement in storage.
     *
     * @param  int              $id
     * @param UpdateRequirementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequirementRequest $request)
    {
        $requirement = $this->requirementRepository->find($id);

        if (empty($requirement)) {
            Flash::error('Exigencia não encontrada');

            return redirect(route('requirements.index'));
        }

        $requirement = $this->requirementRepository->update($request->all(), $id);

        Flash::success('Exigencia atualizada com sucesso.');

        return redirect(route('requirements.index'));
    }

    /**
     * Remove the specified Requirement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requirement = $this->requirementRepository->find($id);

        if (empty($requirement)) {
            Flash::error('Exigencia não encontrada');
            return redirect(route('requirements.index'));
        }

        $certificates = "";

        if($requirement->certificates->count() > 0) {
            foreach ($requirement->certificates as $certificate) {
                $certificates .=  $certificate->name . ",";
            }
            $certificates = substr($certificates,0,-1);

            Flash::error("Esta exigencia esta sendo utilizada nos certificados: ($certificates) ");
            return redirect(route('requirements.index'));
        }

        $this->requirementRepository->delete($id);

        Flash::success('Exigencia deletada com sucesso.');

        return redirect(route('requirements.index'));
    }
}
