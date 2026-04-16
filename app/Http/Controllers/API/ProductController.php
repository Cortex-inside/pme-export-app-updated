<?php
/**
 * Created by PhpStorm.
 * User: guilhermedias
 * Date: 25/09/18
 * Time: 14:26
 */

namespace PMEexport\Http\Controllers\API;


use Illuminate\Support\Facades\Auth;
use PMEexport\Http\Controllers\AppBaseController;
use PMEexport\Http\Controllers\Controller;
use PMEexport\Http\Resources\ProductCategoryResource;
use PMEexport\Http\Resources\ProductResource;
use PMEexport\Repositories\ProductCategoryRepository;
use PMEexport\Repositories\ProductRepository;
use PMEexport\Services\CertificateService;
use PMEexport\Services\CompanyService;
use PMEexport\Services\ProductService;

class ProductController extends Controller
{
    /**
     * @var CertificateService
     */
    private $productCategoryRepository;


    /**
     * CompanyController constructor.
     */
    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function products()
    {
        $listProductCategory = $this->productCategoryRepository->all();

        $productCategory = [];

        foreach ($listProductCategory as $category) {
            $productCategory[$category->uuid] = new ProductCategoryResource($category);
        }

        return response()->json(['data' => $productCategory], 200);
    }
}