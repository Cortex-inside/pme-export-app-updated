<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCompanyCaeRequest;
use PMEexport\Http\Requests\UpdateCompanyCaeRequest;
use PMEexport\Repositories\CompanyCaeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyCaeController extends AppBaseController
{
    /** @var  CompanyCaeRepository */
    private $companyCaeRepository;

    public function __construct(CompanyCaeRepository $companyCaeRepo)
    {
        $this->companyCaeRepository = $companyCaeRepo;
    }

    /**
     * Display a listing of the CompanyCae.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyCaeRepository->pushCriteria(new RequestCriteria($request));
        $companyCaes = $this->companyCaeRepository->all();

        return view('company_caes.index')
            ->with('companyCaes', $companyCaes);
    }

    /**
     * Show the form for creating a new CompanyCae.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_caes.create');
    }

    /**
     * Store a newly created CompanyCae in storage.
     *
     * @param CreateCompanyCaeRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyCaeRequest $request)
    {
        $input = $request->all();

        $companyCae = $this->companyCaeRepository->create($input);

        Flash::success('Company Cae saved successfully.');

        return redirect(route('companyCaes.index'));
    }

    /**
     * Display the specified CompanyCae.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyCae = $this->companyCaeRepository->find($id);

        if (empty($companyCae)) {
            Flash::error('Company Cae not found');

            return redirect(route('companyCaes.index'));
        }

        return view('company_caes.show')->with('companyCae', $companyCae);
    }

    /**
     * Show the form for editing the specified CompanyCae.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyCae = $this->companyCaeRepository->find($id);

        if (empty($companyCae)) {
            Flash::error('Company Cae not found');

            return redirect(route('companyCaes.index'));
        }

        return view('company_caes.edit')->with('companyCae', $companyCae);
    }

    /**
     * Update the specified CompanyCae in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyCaeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyCaeRequest $request)
    {
        $companyCae = $this->companyCaeRepository->find($id);

        if (empty($companyCae)) {
            Flash::error('Company Cae not found');

            return redirect(route('companyCaes.index'));
        }

        $companyCae = $this->companyCaeRepository->update($request->all(), $id);

        Flash::success('Company Cae updated successfully.');

        return redirect(route('companyCaes.index'));
    }

    /**
     * Remove the specified CompanyCae from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyCae = $this->companyCaeRepository->find($id);

        if (empty($companyCae)) {
            Flash::error('Company Cae not found');

            return redirect(route('companyCaes.index'));
        }

        $this->companyCaeRepository->delete($id);

        Flash::success('Company Cae deleted successfully.');

        return redirect(route('companyCaes.index'));
    }
}
