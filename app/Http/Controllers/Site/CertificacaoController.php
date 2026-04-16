<?php

namespace PMEexport\Http\Controllers\Site;

use PMEexport\Http\Controllers\AppBaseController;
use Flash;
use PMEexport\Services\CertificateService;
use Response;

class CertificacaoController extends AppBaseController
{
    private $certificateService;

    public function __construct(CertificateService $certificateService)
    {

        $this->certificateService = $certificateService;
    }

    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function online()
    {
        return redirect('/exchange');

        $listCertificateCategory = $this->certificateService->listCertificateCategoryWebsite();
        $listCertificate = $this->certificateService->listCertificateWebsite();

        return view('site.certificacao.online')
            ->with(["listCertificateCategory"=>$listCertificateCategory, "listCertificate"=>$listCertificate]);
    }
    public function club()
    {
        return redirect('/exchange');

        return view('site.certificacao.club');
    }

}
