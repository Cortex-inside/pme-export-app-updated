<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateLegalSituationRequest;
use PMEexport\Http\Requests\UpdateLegalSituationRequest;
use PMEexport\Repositories\LegalSituationRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LegalSituationController extends AppBaseController
{
    /** @var  LegalSituationRepository */
    private $legalSituationRepository;

    public function __construct(LegalSituationRepository $legalSituationRepo)
    {
        $this->legalSituationRepository = $legalSituationRepo;
    }

    /**
     * Display a listing of the LegalSituation.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->legalSituationRepository->pushCriteria(new RequestCriteria($request));
        $legalSituations = $this->legalSituationRepository->all();

        return view('legal_situations.index')
            ->with('legalSituations', $legalSituations);
    }

    /**
     * Show the form for creating a new LegalSituation.
     *
     * @return Response
     */
    public function create()
    {
        return view('legal_situations.create');
    }

    /**
     * Store a newly created LegalSituation in storage.
     *
     * @param CreateLegalSituationRequest $request
     *
     * @return Response
     */
    public function store(CreateLegalSituationRequest $request)
    {
        $input = $request->all();

        $legalSituation = $this->legalSituationRepository->create($input);

        Flash::success('Legal Situation saved successfully.');

        return redirect(route('legalSituations.index'));
    }

    /**
     * Display the specified LegalSituation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $legalSituation = $this->legalSituationRepository->find($id);

        if (empty($legalSituation)) {
            Flash::error('Legal Situation not found');

            return redirect(route('legalSituations.index'));
        }

        return view('legal_situations.show')->with('legalSituation', $legalSituation);
    }

    /**
     * Show the form for editing the specified LegalSituation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $legalSituation = $this->legalSituationRepository->find($id);

        if (empty($legalSituation)) {
            Flash::error('Legal Situation not found');

            return redirect(route('legalSituations.index'));
        }

        return view('legal_situations.edit')->with('legalSituation', $legalSituation);
    }

    /**
     * Update the specified LegalSituation in storage.
     *
     * @param  int              $id
     * @param UpdateLegalSituationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLegalSituationRequest $request)
    {
        $legalSituation = $this->legalSituationRepository->find($id);

        if (empty($legalSituation)) {
            Flash::error('Legal Situation not found');

            return redirect(route('legalSituations.index'));
        }

        $legalSituation = $this->legalSituationRepository->update($request->all(), $id);

        Flash::success('Legal Situation updated successfully.');

        return redirect(route('legalSituations.index'));
    }

    /**
     * Remove the specified LegalSituation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $legalSituation = $this->legalSituationRepository->find($id);

        if (empty($legalSituation)) {
            Flash::error('Legal Situation not found');

            return redirect(route('legalSituations.index'));
        }

        $this->legalSituationRepository->delete($id);

        Flash::success('Legal Situation deleted successfully.');

        return redirect(route('legalSituations.index'));
    }
}
