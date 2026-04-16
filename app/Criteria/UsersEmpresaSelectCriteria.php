<?php

namespace PMEexport\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UsersSelectCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class UsersEmpresaSelectCriteria implements CriteriaInterface
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
        $model = $model
            ->selectRaw('users.*')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.model_type', \PMEexport\Models\User::class)
            ->whereIn('model_has_roles.role_id', [7, 8])
            ->orderBy("users.id", "desc");

        return $model;
    }
}
