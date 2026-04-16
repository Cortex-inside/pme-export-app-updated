<?php

namespace PMEexport\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CompanyByStatusCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class CompanyEmpresaCriteria implements CriteriaInterface
{

    /**
     * CompanyCertificateByStatusCriteria constructor.
     */
    public function __construct()
    {
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

        if(auth()->user()->hasAnyRole(['empresa','empresa_estrangeira'])) {

            $company_id = Auth::user()->company_id;

            $model = $model->where("id", $company_id);
        }

        return $model;
    }
}
