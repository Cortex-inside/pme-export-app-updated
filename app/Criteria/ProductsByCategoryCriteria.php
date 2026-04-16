<?php

namespace PMEexport\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ProductsByCategoryCriteria.
 *
 * @package namespace PMEexport\Criteria;
 */
class ProductsByCategoryCriteria implements CriteriaInterface
{
    /**
     * @var
     */
    private $id;

    /**
     * ProductsByCategoryCriteria constructor.
     */
    public function __construct($id)
    {
        $this->id = $id;
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
        $model = $model->where(['product_category_id' => $this->id]);

        return $model;
    }
}
