<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCertificateRequirementRequest;
use PMEexport\Http\Requests\UpdateCertificateRequirementRequest;
use PMEexport\Repositories\CertificateRequirementRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CertificateRequirementController extends AppBaseController
{
    /** @var  CertificateRequirementRepository */
    private $certificateRequirementRepository;

    public function __construct(CertificateRequirementRepository $certificateRequirementRepo)
    {
        $this->certificateRequirementRepository = $certificateRequirementRepo;
    }

    /**
     * Display a listing of the CertificateRequirement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->certificateRequirementRepository->pushCriteria(new RequestCriteria($request));
        $certificateRequirements = $this->certificateRequirementRepository->all();

        return view('certificate_requirements.index')
            ->with('certificateRequirements', $certificateRequirements);
    }

    /**
     * Show the form for creating a new CertificateRequirement.
     *
     * @return Response
     */
    public function create()
    {
        return view('certificate_requirements.create');
    }

    /**
     * Store a newly created CertificateRequirement in storage.
     *
     * @param CreateCertificateRequirementRequest $request
     *
     * @return Response
     */
    public function store(CreateCertificateRequirementRequest $request)
    {
        $input = $request->all();

        $certificateRequirement = $this->certificateRequirementRepository->create($input);

        Flash::success('Certificate Requirement saved successfully.');

        return redirect(route('certificateRequirements.index'));
    }

    /**
     * Display the specified CertificateRequirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $certificateRequirement = $this->certificateRequirementRepository->find($id);

        if (empty($certificateRequirement)) {
            Flash::error('Certificate Requirement not found');

            return redirect(route('certificateRequirements.index'));
        }

        return view('certificate_requirements.show')->with('certificateRequirement', $certificateRequirement);
    }

    /**
     * Show the form for editing the specified CertificateRequirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $certificateRequirement = $this->certificateRequirementRepository->find($id);

        if (empty($certificateRequirement)) {
            Flash::error('Certificate Requirement not found');

            return redirect(route('certificateRequirements.index'));
        }

        return view('certificate_requirements.edit')->with('certificateRequirement', $certificateRequirement);
    }

    /**
     * Update the specified CertificateRequirement in storage.
     *
     * @param  int              $id
     * @param UpdateCertificateRequirementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCertificateRequirementRequest $request)
    {
        $certificateRequirement = $this->certificateRequirementRepository->find($id);

        if (empty($certificateRequirement)) {
            Flash::error('Certificate Requirement not found');

            return redirect(route('certificateRequirements.index'));
        }

        $certificateRequirement = $this->certificateRequirementRepository->update($request->all(), $id);

        Flash::success('Certificate Requirement updated successfully.');

        return redirect(route('certificateRequirements.index'));
    }

    /**
     * Remove the specified CertificateRequirement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $certificateRequirement = $this->certificateRequirementRepository->find($id);

        if (empty($certificateRequirement)) {
            Flash::error('Certificate Requirement not found');

            return redirect(route('certificateRequirements.index'));
        }

        $this->certificateRequirementRepository->delete($id);

        Flash::success('Certificate Requirement deleted successfully.');

        return redirect(route('certificateRequirements.index'));
    }
}
