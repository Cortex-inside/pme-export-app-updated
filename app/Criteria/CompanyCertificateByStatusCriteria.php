<?php

namespace PMEexport\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CompanyCertificateByStatusCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class CompanyCertificateByStatusCriteria implements CriteriaInterface
{
    private $status;

    /**
     * CompanyCertificateByStatusCriteria constructor.
     */
    public function __construct($status)
    {
        $this->status = $status;
    }


    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {

        $model = $model
            ->select("company_certificates.*")
            ->with(['company','certificate'])
            ->join('certificates', 'company_certificates.certificate_id', '=' ,'certificates.id')
        ;

        $departamentoUser = Auth::user()->department_id;

        if($departamentoUser){
            $model = $model->where(['certificates.department_id' => $departamentoUser]);
        }

        if($this->status != 0){
            $model = $model->where(['company_certificates.status' => $this->status]);
        }


        return $model;
    }
}
