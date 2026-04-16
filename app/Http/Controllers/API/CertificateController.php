<?php
/**
 * Created by PhpStorm.
 * User: guilhermedias
 * Date: 25/09/18
 * Time: 14:26
 */

namespace PMEexport\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PMEexport\Http\Controllers\Controller;
use PMEexport\Http\Resources\CertificateCategoryResource;
use PMEexport\Models\Certificate;
use PMEexport\Services\CertificateService;

class CertificateController extends Controller
{
    /**
     * @var CertificateService
     */
    private $certificateService;
    /**
     * CompanyController constructor.
     */
    public function __construct(CertificateService $certificateService)
    {
        $this->certificateService = $certificateService;
    }


    public function listOfCertificates()
    {
        return $this->certificateService->listOfCertificates();
    }


    public function listOfCertificatesShow(Certificate $certificate)
    {
        return Certificate::where('uuid',$certificate->uuid)->with('certificateRequirements','certificateRequirements.requirement')->first();
    }

    public function getCertificatesFromCompany()
    {
        if (!Auth::guard('api')->check()) {
            $arrayError = array("data" => array("error" => "Erro na autenticação"));

            return $arrayError;
        }

        $user = Auth::guard('api')->user();

        if(!$user->hasRole('empresa') && !$user->hasRole('empresa_estrangeira')){
            $arrayError = array("data" => array("error" => "Não é uma empresa"));

            return $arrayError;
        }
        if($user->company->status != 6){
            $arrayError = array("data" => array("error" => "Empresa sem cadastro aprovado"));

            return $arrayError;
        }

        return $this->certificateService->showCertificatesFromCompanyAPI();

    }

    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function listaCertificado()
    {
        $listCertificateCategory = $this->certificateService->listCertificateCategoryWebsite();

        $listCertificate = [];

        foreach ($listCertificateCategory as $category) {
            $listCertificate[$category->uuid] = new CertificateCategoryResource($category);
        }

        return response()->json(['data' => $listCertificate], 200);
    }

    public function storeRequestCertificateFromApp(Request $request)
    {
        return $this->certificateService->storeRequestCertificateFromApp($request);
    }
}