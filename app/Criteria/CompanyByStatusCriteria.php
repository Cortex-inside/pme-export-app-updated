<?php

namespace PMEexport\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CompanyByStatusCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class CompanyByStatusCriteria implements CriteriaInterface
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
        $model = $model->where(['status' => $this->status]);

        return $model;
    }
}
