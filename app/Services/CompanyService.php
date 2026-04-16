<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 16:56
 */

namespace PMEexport\Services;


use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PMEexport\Support\UploadStorage;
use PMEexport\Repositories\CompanyCaeRepository;
use PMEexport\Repositories\CompanyEmailRepository;
use PMEexport\Repositories\CompanyPhoneRepository;
use PMEexport\Repositories\CompanyRepository;

class CompanyService
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @var CompanyEmailRepository
     */
    private $companyEmailRepository;
    /**
     * @var CompanyPhoneRepository
     */
    private $companyPhoneRepository;
    /**
     * @var CompanyCaeRepository
     */
    private $companyCaeRepository;


    /**
     * CompanyService constructor.
     */
    public function __construct(CompanyRepository $companyRepository, CompanyEmailRepository $companyEmailRepository, CompanyPhoneRepository $companyPhoneRepository, CompanyCaeRepository $companyCaeRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->companyEmailRepository = $companyEmailRepository;
        $this->companyPhoneRepository = $companyPhoneRepository;
        $this->companyCaeRepository = $companyCaeRepository;
    }

    public function showEditView($id)
    {
        $company = $this->companyRepository->find($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.company.edit')->with('company', $company);
    }

    public function showCompany()
    {
        $empresaId = Auth::user()->company_id;
        $company = $this->companyRepository->find($empresaId);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('sysCompany.index'));
        }

        return view('companies.company.index')
            ->with('company', $company);
    }

    public function registerCompany($request){
        $dados = $request->all();
        $companyId  = Auth::user()->company_id;

        $caes = $dados['caes'];
        unset($dados['caes']);
        $phones = $dados['phones'];
        unset($dados['phones']);
        $emails = $dados['emails'];
        unset($dados['emails']);

        // SALVANDO OS DOCUMENTOS NUIT E ALVARA NO S3 E COLOCANDO SUAS URLS NO ARRAY
        $nuitDoc    = $request->file('nuit_doc');

        if($nuitDoc) {
            $path = UploadStorage::storePublicly($nuitDoc, '/imagens/documents');

            $path = UploadStorage::url($path);
            $dados['nuit_doc'] = $path;
        }

        $alvaraDoc  = $request->file('alvara_doc');
        if($alvaraDoc) {
            $path = UploadStorage::storePublicly($alvaraDoc, '/imagens/documents');

            $path = UploadStorage::url($path);
            $dados['alvara_doc'] = $path;
        }
        //PASSANDO O STATUS PARA AGUARDANDO APROVAÇÃO
        $dados['status'] = 1;

        $this->companyRepository->update($dados, $companyId);

        foreach ($caes as $cae){
            $dataCae = array(
                'cae_id' => $cae,
                'company_id' => $companyId
            );
            $this->companyCaeRepository->create($dataCae);
        }

        foreach ($phones as $phone){
            $dataPhone = array(
                'company_id' => $companyId,
                'number' => $phone
            );
            $this->companyPhoneRepository->create($dataPhone);
        }

        foreach ($emails as $email){
            $dataEmail = array(
                'company_id' => $companyId,
                'email' => $email
            );
            $this->companyEmailRepository->create($dataEmail);
        }

        return redirect(route('exchange.index'));
    }


    public function photoStore($company, $request){

        $dados = $request->all();
        $companyId  = Auth::user()->company_id;

        $this->companyRepository->update(['photo'=>$dados['photo']], $companyId);

        return redirect(route('sysCompany.company.index'));
    }
}