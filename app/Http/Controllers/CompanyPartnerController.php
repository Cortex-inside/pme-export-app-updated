<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PMEexport\Criteria\PartnersByCompanyCriteria;
use PMEexport\Http\Requests\CreateCompanyPartnerRequest;
use PMEexport\Http\Requests\UpdateCompanyPartnerRequest;
use PMEexport\Repositories\CompanyPartnerRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyPartnerController extends AppBaseController
{
    /** @var  CompanyPartnerRepository */
    private $companyPartnerRepository;

    public function __construct(CompanyPartnerRepository $companyPartnerRepo)
    {
        $this->companyPartnerRepository = $companyPartnerRepo;
    }

    /**
     * Display a listing of the CompanyPartner.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyPartnerRepository->pushCriteria(new RequestCriteria($request));
        $this->companyPartnerRepository->pushCriteria(new PartnersByCompanyCriteria($request));
        $companyPartners = $this->companyPartnerRepository->paginate();

        return view('company_partners.index')
            ->with('companyPartners', $companyPartners);
    }

    /**
     * Show the form for creating a new CompanyPartner.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_partners.create');
    }

    /**
     * Store a newly created CompanyPartner in storage.
     *
     * @param CreateCompanyPartnerRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyPartnerRequest $request)
    {
        $input = $request->all();

        $input['company_id'] = $userId = Auth::user()->company->id;

        $companyPartner = $this->companyPartnerRepository->create($input);

        Flash::success('Sócio da empresa salvo com sucesso.');

        return redirect(route('companyPartners.index'));
    }

    /**
     * Display the specified CompanyPartner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyPartner = $this->companyPartnerRepository->find($id);

        if (empty($companyPartner)) {
            Flash::error('Sócio da empresa não encontrado');

            return redirect(route('companyPartners.index'));
        }

        return view('company_partners.show')->with('companyPartner', $companyPartner);
    }

    /**
     * Show the form for editing the specified CompanyPartner.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyPartner = $this->companyPartnerRepository->find($id);

        if (empty($companyPartner)) {
            Flash::error('Sócio da empresa não encontrado');

            return redirect(route('companyPartners.index'));
        }

        return view('company_partners.edit')->with('companyPartner', $companyPartner);
    }

    /**
     * Update the specified CompanyPartner in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyPartnerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyPartnerRequest $request)
    {
        $companyPartner = $this->companyPartnerRepository->find($id);

        if (empty($companyPartner)) {
            Flash::error('Sócio da empresa não encontrado');

            return redirect(route('companyPartners.index'));
        }

        $companyPartner = $this->companyPartnerRepository->update($request->all(), $id);

        Flash::success('Sócio da empresa atualizado com sucesso.');

        return redirect(route('companyPartners.index'));
    }

    /**
     * Remove the specified CompanyPartner from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyPartner = $this->companyPartnerRepository->find($id);

        if (empty($companyPartner)) {
            Flash::error('Sócio da empresa não encontrado');

            return redirect(route('companyPartners.index'));
        }

        $this->companyPartnerRepository->delete($id);

        Flash::success('Sócio da empresa deletado com sucesso.');

        return redirect(route('companyPartners.index'));
    }
}
