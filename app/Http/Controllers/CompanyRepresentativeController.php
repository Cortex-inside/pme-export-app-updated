<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PMEexport\Criteria\RepresentantesByCompanyCriteria;
use PMEexport\Http\Requests\CreateCompanyRepresentativeRequest;
use PMEexport\Http\Requests\UpdateCompanyRepresentativeRequest;
use PMEexport\Repositories\CompanyRepresentativeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyRepresentativeController extends AppBaseController
{
    /** @var  CompanyRepresentativeRepository */
    private $companyRepresentativeRepository;

    public function __construct(CompanyRepresentativeRepository $companyRepresentativeRepo)
    {
        $this->companyRepresentativeRepository = $companyRepresentativeRepo;
    }

    /**
     * Display a listing of the CompanyRepresentative.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyRepresentativeRepository->pushCriteria(new RequestCriteria($request));
        $this->companyRepresentativeRepository->pushCriteria(new RepresentantesByCompanyCriteria($request));
        $companyRepresentatives = $this->companyRepresentativeRepository->paginate();

        return view('company_representatives.index')
            ->with('companyRepresentatives', $companyRepresentatives);
    }

    /**
     * Show the form for creating a new CompanyRepresentative.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_representatives.create');
    }

    /**
     * Store a newly created CompanyRepresentative in storage.
     *
     * @param CreateCompanyRepresentativeRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRepresentativeRequest $request)
    {
        $input = $request->all();

        $input['company_id'] = $userId = Auth::user()->company->id;

        $companyRepresentative = $this->companyRepresentativeRepository->create($input);

        Flash::success('Representante da empresa criada com sucesso.');

        return redirect(route('companyRepresentatives.index'));
    }

    /**
     * Display the specified CompanyRepresentative.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyRepresentative = $this->companyRepresentativeRepository->find($id);

        if (empty($companyRepresentative)) {
            Flash::error('Representante da empresa não encontrado');

            return redirect(route('companyRepresentatives.index'));
        }

        return view('company_representatives.show')->with('companyRepresentative', $companyRepresentative);
    }

    /**
     * Show the form for editing the specified CompanyRepresentative.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyRepresentative = $this->companyRepresentativeRepository->find($id);

        if (empty($companyRepresentative)) {
            Flash::error('Representante da empresa não encontrado');

            return redirect(route('companyRepresentatives.index'));
        }

        return view('company_representatives.edit')->with('companyRepresentative', $companyRepresentative);
    }

    /**
     * Update the specified CompanyRepresentative in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRepresentativeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRepresentativeRequest $request)
    {
        $companyRepresentative = $this->companyRepresentativeRepository->find($id);

        if (empty($companyRepresentative)) {
            Flash::error('Representante da empresa não encontrado');

            return redirect(route('companyRepresentatives.index'));
        }

        $companyRepresentative = $this->companyRepresentativeRepository->update($request->all(), $id);

        Flash::success('Representante da empresa atualizado com sucesso.');

        return redirect(route('companyRepresentatives.index'));
    }

    /**
     * Remove the specified CompanyRepresentative from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyRepresentative = $this->companyRepresentativeRepository->find($id);

        if (empty($companyRepresentative)) {
            Flash::error('Representante da empresa não encontrado');

            return redirect(route('companyRepresentatives.index'));
        }

        $this->companyRepresentativeRepository->delete($id);

        Flash::success('Representante da empresa deletado com sucesso.');

        return redirect(route('companyRepresentatives.index'));
    }
}
