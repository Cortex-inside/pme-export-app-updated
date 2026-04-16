<?php

/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 13:57
 */

namespace PMEexport\Services;


use Laracasts\Flash\Flash;
use PMEexport\Repositories\CertificateCategoryRepository;
use PMEexport\Repositories\CertificateRepository;
use PMEexport\Repositories\DocumentRepository;

class DocumentService
{

    /**
     * @var DocumentRepository
     */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function saveDocument($document)
    {
        $this->documentRepository->create($document);
    }
}
