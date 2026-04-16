<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PMEexport\Http\Requests\CreateProductRequest;
use PMEexport\Http\Requests\UpdateProductRequest;
use PMEexport\Models\Product;
use PMEexport\Repositories\CompanyAnnouncementRepository;
use PMEexport\Repositories\ProductCategoryRepository;
use PMEexport\Repositories\ProductRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use PMEexport\Services\ProductCategoryService;
use PMEexport\Services\ProductService;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;
    /**
     * @var ProductService
     */
    private $productService;
    /**
     * @var ProductCategoryService
     */
    private $productCategoryService;
    private $productCategoryRepository;
    private $companyAnnouncementRepository;

    public function __construct(ProductRepository $productRepo,
                                ProductService $productService,
                                ProductCategoryService $productCategoryService,
                                ProductCategoryRepository $productCategoryRepository,
                                CompanyAnnouncementRepository $companyAnnouncementRepository)
    {
        $this->productRepository = $productRepo;
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->companyAnnouncementRepository = $companyAnnouncementRepository;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->paginate();

        return view('products.index')
            ->with('products', $products);
    }

    public function indexCompany(Request $request)
    {
         return $this->productService->showProductsCompanyToUser($request);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $listProductCategory = $this->productCategoryService->getAll();
        return view('products.create', compact('listProductCategory'));
    }

    public function createCompany()
    {
        $listProductCategory = $this->productCategoryService->getAll();
        return view('products.company_products.create', compact('listProductCategory'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        return $this->productService->createProduct($request);
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Product $product)
    {
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Product $product)
    {
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $listProductCategory = $this->productCategoryService->getAll();

        return view('products.edit')->with(['product' => $product, 'listProductCategory' => $listProductCategory]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $product->id);

        Flash::success(__("sistema.ItemUpdated"));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Product $product)
    {

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        if (!empty($this->companyAnnouncementRepository->findWhere(["product_id"=>$product->id])->first())) {
            Flash::error(__("sistema.ItemEstaSendoUsado"));

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($product->id);

        Flash::success('Produto excluido com sucesso!.');

        return redirect(route('products.index'));
    }

    public function getByCategoryAjax($id)
    {
        return $this->productService->getByCategoryAjax($id);

        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Produto not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Produto excluido com sucesso!.');

        return redirect(route('products.index'));
    }
}
