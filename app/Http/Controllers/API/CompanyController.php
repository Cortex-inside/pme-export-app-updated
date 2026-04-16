<?php
/**
 * Created by PhpStorm.
 * User: guilhermedias
 * Date: 25/09/18
 * Time: 14:26
 */

namespace PMEexport\Http\Controllers\API;


use Illuminate\Support\Facades\Auth;
use PMEexport\Http\Controllers\AppBaseController;
use PMEexport\Http\Controllers\Controller;
use PMEexport\Services\CompanyService;

class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    private $companyService;


    /**
     * CompanyController constructor.
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function verifyIsCompany(){
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
//
//        $data = array("last_login"=> Carbon::now(),"ip"=>request()->ip());
//        $user->update($data);

        $array = array("data" => array("success" => true,"empresa"=>$user));

        return $array;
    }

    public function getCertificates()
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

        $array = array("data" => array("success" => true,"empresa"=>$user));

        return $array;

    }

}