<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Criteria\CompanyByStatusCriteria;
use PMEexport\Criteria\CompanyEmpresaCriteria;
use PMEexport\Http\Requests\CreateCompanyRequest;
use PMEexport\Http\Requests\UpdateCompanyRequest;
use PMEexport\Http\Requests\UpdateUserPasswordRequest;
use PMEexport\Models\Company;
use PMEexport\Models\User;
use PMEexport\Repositories\CompanyRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Services\CompanyService;
use PMEexport\Services\UserService;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyController extends AppBaseController
{
    /** @var  CompanyRepository */
    private $companyRepository;
    /**
     * @var CompanyService
     */
    private $companyService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(CompanyRepository $companyRepo, CompanyService $companyService, UserService $userService)
    {
        $this->companyRepository = $companyRepo;
        $this->companyService = $companyService;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the Company.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $this->companyRepository->pushCriteria(new CompanyEmpresaCriteria());
        $companies = $this->companyRepository->paginate();

        return view('companies.index')
            ->with('companies', $companies);
    }


    public function pending(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $this->companyRepository->pushCriteria(new CompanyByStatusCriteria(Company::STATUS_PENDING_APPROVAL));
        $companies = $this->companyRepository->paginate();

        return view('companies.index')
            ->with('companies', $companies);
    }
    public function approved(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $this->companyRepository->pushCriteria(new CompanyByStatusCriteria(Company::STATUS_APPROVED));
        $companies = $this->companyRepository->paginate();

        return view('companies.index')
            ->with('companies', $companies);
    }

    public function disapproved(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $this->companyRepository->pushCriteria(new CompanyByStatusCriteria(Company::STATUS_DISAPPROVED));
        $companies = $this->companyRepository->paginate();

        return view('companies.index')
            ->with('companies', $companies);
    }

    public function approve(Company $company)
    {

        if (empty($company)) {
            Flash::error('Empresa n�o encontrada.');

            return redirect(route('companies.index'));
        }
        DB::transaction(function () use ($company) {
            $this->companyRepository->update(['status' => Company::STATUS_APPROVED], $company->id);
        });

        Flash::success('Empresa aprovada com sucesso.');

        return redirect()->back();
    }

    public function disapprove(Request $request)
    {
        $input = $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'motive_disapprove' => 'required|string|max:1000',
        ]);
        $company = $this->companyRepository->find($input['company_id']);

        if (empty($company)) {
            Flash::error('Empresa n�o encontrada.');

            return redirect(route('companies.index'));
        }
        DB::transaction(function () use ($company, $input) {
            $this->companyRepository->update([
                'status' => Company::STATUS_REVIEW_REQUESTED,
                'motive_disapprove' => $input['motive_disapprove'],
            ], $company->id);
        });

        Flash::success('Empresa reprovada com sucesso.');

        //TODO: ADICIONAR ENVIO DE EMAIL AQUI

        return redirect()->back();
    }

    public function indexMyCompany()
    {
        return $this->companyService->showCompany();
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();

        $company = $this->companyRepository->create($input);

        Flash::success('Company saved successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Company $company)
    {
        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        if($company->type == 2) {
            return view('companies.show-estrangeira')->with('company', $company);
        } else {
            return view('companies.show')->with('company', $company);
        }
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Company $company)
    {
        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        if (empty($company)) {
            Flash::error('Empresa não existe');

            return redirect(route('companies.index'));
        }

        $company = $this->companyRepository->update($request->all(), $company->id);

        Flash::success('Empresa atualizada com sucesso.');

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Company $company)
    {
        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $this->companyRepository->delete($company->id);

        Flash::success('Empresa exclida com sucesso.');

        return redirect(route('companies.index'));
    }

    public function changePassword(User $user)
    {
        return view('users.change_password', compact('user'));
    }

    public function updatePassword(UpdateUserPasswordRequest $request, User $user)
    {
        $return = $this->userService->updatePassword($request, $user);

        Flash::success('Senha alterada com sucesso.');

        return redirect(route('sysCompany.company.users.change_password', $user->uuid));
    }
}
