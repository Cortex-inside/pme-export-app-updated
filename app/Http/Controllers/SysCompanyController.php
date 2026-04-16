<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PMEexport\Http\Requests\CreateCompanyComplementRequest;
use PMEexport\Models\Company;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Services\CompanyService;

class SysCompanyController extends Controller
{
    /**
     * @var CaeRepository
     */
    private $caeRepository;
    /**
     * @var CompanyService
     */
    private $companyService;


    /**
     * SysCompanyController constructor.
     */
    public function __construct(CaeRepository $caeRepository, CompanyService $companyService)
    {
        $this->caeRepository = $caeRepository;
        $this->companyService = $companyService;
    }

    public function index()
    {
        return view('sysCompany.index');
    }

    public function complementRegister()
    {
        if(Auth::user()->company->status != 5 && Auth::user()->company->status != 4){
            return view('sysCompany.index');
        }

        $company = Auth::user()->company;

        $listCAEs = $this->caeRepository->all();

        return view('companies.company.complement')->with(['listCAEs' => $listCAEs, 'company' => $company]);
    }

    public function storeComplementRegister(CreateCompanyComplementRequest $request)
    {
        return $this->companyService->registerCompany($request);
    }

    public function photoStore(Company $company, Request $request)
    {
        return $this->companyService->photoStore($company, $request);
    }
}
