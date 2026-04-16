<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCompanyEmailRequest;
use PMEexport\Http\Requests\UpdateCompanyEmailRequest;
use PMEexport\Repositories\CompanyEmailRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyEmailController extends AppBaseController
{
    /** @var  CompanyEmailRepository */
    private $companyEmailRepository;

    public function __construct(CompanyEmailRepository $companyEmailRepo)
    {
        $this->companyEmailRepository = $companyEmailRepo;
    }

    /**
     * Display a listing of the CompanyEmail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyEmailRepository->pushCriteria(new RequestCriteria($request));
        $companyEmails = $this->companyEmailRepository->all();

        return view('company_emails.index')
            ->with('companyEmails', $companyEmails);
    }

    /**
     * Show the form for creating a new CompanyEmail.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_emails.create');
    }

    /**
     * Store a newly created CompanyEmail in storage.
     *
     * @param CreateCompanyEmailRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyEmailRequest $request)
    {
        $input = $request->all();

        $companyEmail = $this->companyEmailRepository->create($input);

        Flash::success('Company Email saved successfully.');

        return redirect(route('companyEmails.index'));
    }

    /**
     * Display the specified CompanyEmail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyEmail = $this->companyEmailRepository->find($id);

        if (empty($companyEmail)) {
            Flash::error('Company Email not found');

            return redirect(route('companyEmails.index'));
        }

        return view('company_emails.show')->with('companyEmail', $companyEmail);
    }

    /**
     * Show the form for editing the specified CompanyEmail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyEmail = $this->companyEmailRepository->find($id);

        if (empty($companyEmail)) {
            Flash::error('Company Email not found');

            return redirect(route('companyEmails.index'));
        }

        return view('company_emails.edit')->with('companyEmail', $companyEmail);
    }

    /**
     * Update the specified CompanyEmail in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyEmailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyEmailRequest $request)
    {
        $companyEmail = $this->companyEmailRepository->find($id);

        if (empty($companyEmail)) {
            Flash::error('Company Email not found');

            return redirect(route('companyEmails.index'));
        }

        $companyEmail = $this->companyEmailRepository->update($request->all(), $id);

        Flash::success('Company Email updated successfully.');

        return redirect(route('companyEmails.index'));
    }

    /**
     * Remove the specified CompanyEmail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyEmail = $this->companyEmailRepository->find($id);

        if (empty($companyEmail)) {
            Flash::error('Company Email not found');

            return redirect(route('companyEmails.index'));
        }

        $this->companyEmailRepository->delete($id);

        Flash::success('Company Email deleted successfully.');

        return redirect(route('companyEmails.index'));
    }
}
