<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCompanyPhoneRequest;
use PMEexport\Http\Requests\UpdateCompanyPhoneRequest;
use PMEexport\Repositories\CompanyPhoneRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyPhoneController extends AppBaseController
{
    /** @var  CompanyPhoneRepository */
    private $companyPhoneRepository;

    public function __construct(CompanyPhoneRepository $companyPhoneRepo)
    {
        $this->companyPhoneRepository = $companyPhoneRepo;
    }

    /**
     * Display a listing of the CompanyPhone.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyPhoneRepository->pushCriteria(new RequestCriteria($request));
        $companyPhones = $this->companyPhoneRepository->all();

        return view('company_phones.index')
            ->with('companyPhones', $companyPhones);
    }

    /**
     * Show the form for creating a new CompanyPhone.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_phones.create');
    }

    /**
     * Store a newly created CompanyPhone in storage.
     *
     * @param CreateCompanyPhoneRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyPhoneRequest $request)
    {
        $input = $request->all();

        $companyPhone = $this->companyPhoneRepository->create($input);

        Flash::success('Company Phone saved successfully.');

        return redirect(route('companyPhones.index'));
    }

    /**
     * Display the specified CompanyPhone.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyPhone = $this->companyPhoneRepository->find($id);

        if (empty($companyPhone)) {
            Flash::error('Company Phone not found');

            return redirect(route('companyPhones.index'));
        }

        return view('company_phones.show')->with('companyPhone', $companyPhone);
    }

    /**
     * Show the form for editing the specified CompanyPhone.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyPhone = $this->companyPhoneRepository->find($id);

        if (empty($companyPhone)) {
            Flash::error('Company Phone not found');

            return redirect(route('companyPhones.index'));
        }

        return view('company_phones.edit')->with('companyPhone', $companyPhone);
    }

    /**
     * Update the specified CompanyPhone in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyPhoneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyPhoneRequest $request)
    {
        $companyPhone = $this->companyPhoneRepository->find($id);

        if (empty($companyPhone)) {
            Flash::error('Company Phone not found');

            return redirect(route('companyPhones.index'));
        }

        $companyPhone = $this->companyPhoneRepository->update($request->all(), $id);

        Flash::success('Company Phone updated successfully.');

        return redirect(route('companyPhones.index'));
    }

    /**
     * Remove the specified CompanyPhone from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyPhone = $this->companyPhoneRepository->find($id);

        if (empty($companyPhone)) {
            Flash::error('Company Phone not found');

            return redirect(route('companyPhones.index'));
        }

        $this->companyPhoneRepository->delete($id);

        Flash::success('Company Phone deleted successfully.');

        return redirect(route('companyPhones.index'));
    }
}
