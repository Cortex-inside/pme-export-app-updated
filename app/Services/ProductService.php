<?php

/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 13:36
 */

namespace PMEexport\Services;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use PMEexport\Criteria\ProductByCompanyCriteria;
use PMEexport\Criteria\ProductsByCategoryCriteria;
use PMEexport\Repositories\AnnouncementDocumentRepository;
use PMEexport\Repositories\ProductRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Str;

class ProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductService constructor.
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct($request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    public function getByCategoryAjax($id)
    {
        $this->productRepository->pushCriteria(new ProductsByCategoryCriteria($id));
        $products = $this->productRepository->all();

        return $products;
    }
}
