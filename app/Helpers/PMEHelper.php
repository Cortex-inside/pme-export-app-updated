<?php
/**
 * Created by PhpStorm.
 * User: guilhermedias
 * Date: 15/08/18
 * Time: 15:45
 */

use PMEexport\Models\CompanyCertificate;

if (!function_exists('roleHasPermission')) {
    function roleHasPermission($role_id, $permission_id)
    {
        $rolePermission = DB::table("permission_role")
            ->select("value")
            ->where('role_id', $role_id)
            ->where('permission_id', $permission_id)
            ->first();
        if (count($rolePermission) > 0)
            return $rolePermission->value;
        else
            return 2; //só para não dar problema com a comparação de zero
    }
}
if (! function_exists('checkChatPosition')) {
    function checkChatPosition($idUser){
       $userRight = [];

       if(count($userRight) > 0) {
           if (!in_array($userRight, $idUser)) {
               array_push($userRight, $idUser);
           } else {

           }
       }else{
           array_push($userRight, $idUser);
       }
    }
}
if (! function_exists('companyStatus')) {
    function companyStatus($value){
        //exemplo
        switch ($value) {
            case "1": $tipo = "Ativa"; break;

            case "2": $tipo = "Aguardando aprovação"; break;

            case "3": $tipo = "Cadastro cancelado"; break;

            case "4": $tipo = "Empresa desativada"; break;

            case "5": $tipo = "Revisar documentos/informações"; break;

            case "6": $tipo = "Aguardando envio de dados complementares"; break;

            default: $tipo = "Não informado"; break;
        }
        return $tipo;
    }
}
if (! function_exists('listaPais')) {
    function listaPais()
    {

        $json = file_get_contents(public_path() . '/assets/json/paises.json');

        return json_decode($json);
    }
}
if (! function_exists('getLegalSituation')) {
    function getLegalSituation($legal_situation_id)
    {
        $legalSituation = DB::table("legal_situations")
            ->select("name")
            ->where('id',$legal_situation_id)
            ->first();

        if($legalSituation != null && $legalSituation->name != "")
            return $legalSituation->name;
        else
            return "Não informado"; //só para não dar problema com a comparação de zero
    }
}

if (! function_exists('checkMyCertificate')) {
    function checkMyCertificate($idCertificate)
    {
        if(Auth::user()->company) {
            $myCertificates = CompanyCertificate::where(
                ["company_id" => Auth::user()->company->id,
                    "certificate_id" => $idCertificate
                ]
            )
                ->first();

            return $myCertificates;
        } else {
            return false;
        }
    }
}

if (! function_exists('companyStatusList')) {
    function companyStatusList(){
       return [
           "1" =>  "Aguardando aprovação",
           "2" =>  "Cadastro reprovado",
           "3" =>  "Empresa desativada",
           "4" =>  "Revisar documentos/informações",
           "5" =>  "Aguardando finalização de cadastro",
           "6" =>  "Cadastro aprovado",
       ];
    }
}

if (! function_exists('coin')) {
    function coin($id){
        $coin =  [
            "1" =>  "Metical:MT",
            "2" =>  "Dollar:USD",
            "3" =>  "Euro:EUR",
        ];

        return (isset($coin[$id])) ? $coin[$id] : "";
    }
}

if (! function_exists('businessVolumeList')) {
    function businessVolumeList(){
        return [
            "1" =>  "0 » 1.200.000.000 MT Micro",
            "2" =>  "1.200.000.000 MT » 14.700.000.000 MT Pequena",
            "3" =>  "14.700.000.000 MT » 29.970.000.000 MT Média",
        ];
    }
}

if (! function_exists('legalSituation')) {
    function legalSituation(){
        return [
            "1" =>  "Estatal",
            "2" =>  "Privada",
            "3" =>  "Mista",
            "3" =>  "Indefinido",
        ];
    }
}

if (! function_exists('districts')) {
    function districts(){
        return \PMEexport\Models\District::all()->pluck('name', 'id');
    }
}

if (! function_exists('nullable')) {
    function nullable($value){
        return ($value) ? $value : "-";
    }
}
