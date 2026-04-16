<?php

/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 13:57
 */

namespace PMEexport\Services;


use PMEexport\Repositories\ProductCategoryRepository;

class ProductCategoryService
{
    /**
     * @var ProductCategoryRepository
     */
    private $productCategoryRepository;


    /**
     * ProductCategoryService constructor.
     */
    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function getAll()
    {
        return $this->productCategoryRepository->all();
    }
}
