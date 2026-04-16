<?php

namespace PMEexport\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CertificatesByCompanyCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class RepresentantesByCompanyCriteria implements CriteriaInterface
{
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
        $empresaUsuario = Auth::user()->company_id;

        $model = $model->where(['company_id' => $empresaUsuario]);

        return $model;
    }
}
