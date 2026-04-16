<?php

namespace PMEexport\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UsersSelectCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class AnunciosCriteria implements CriteriaInterface
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
        $userCompany = Auth::user()->company;

        if($userCompany) {

            $companyId = $userCompany->id;

            $model = $model
                ->selectRaw('*')
                ->whereNotIn("company_id",[$companyId]);

        }
        return $model;
    }
}
