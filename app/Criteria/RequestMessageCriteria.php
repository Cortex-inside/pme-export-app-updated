<?php

namespace PMEexport\Criteria;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class AnnouncementByCompanyCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class RequestMessageCriteria implements CriteriaInterface
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

        $model = $model;
        $model->orderBy("created_at"," ASC");

        return $model;
    }
}
