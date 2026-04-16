<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PMEexport\Exports\ProductsCategory;
use PMEexport\Exports\ProductsCategoryExport;
use PMEexport\Http\Requests\CreateProductCategoryRequest;
use PMEexport\Http\Requests\UpdateProductCategoryRequest;
use PMEexport\Models\ProductCategory;
use PMEexport\Repositories\ProductCategoryRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Repositories\ProductRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use PMEexport\Support\UploadStorage;

class ProductCategoryController extends AppBaseController
{
    /** @var  ProductCategoryRepository */
    private $productCategoryRepository;
    private $productRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepo, ProductRepository $productRepository)
    {
        $this->productCategoryRepository = $productCategoryRepo;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the ProductCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productCategoryRepository->pushCriteria(new RequestCriteria($request));
        $productCategories = $this->productCategoryRepository->paginate();

        return view('product_categories.index')
            ->with('productCategories', $productCategories);
    }

    /**
     * Show the form for creating a new ProductCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_categories.create');
    }

    /**
     * Store a newly created ProductCategory in storage.
     *
     * @param CreateProductCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $input = $request->all();

        $imageRequest = $request->file('photo');

        $path = UploadStorage::storePublicly($imageRequest, '/imagens/categoria');

        $input["photo"] = $path;

        $productCategory = $this->productCategoryRepository->create($input);

        Flash::success(__("sistema.ItemCrated"));

        return redirect(route('productCategories.index'));
    }

    /**
     * Display the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(ProductCategory $productCategory)
    {

        if (empty($productCategory)) {
            Flash::error(__("sistema.ItemNotExist"));

            return redirect(route('productCategories.index'));
        }

        return view('product_categories.show')->with('productCategory', $productCategory);
    }

    /**
     * Show the form for editing the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(ProductCategory $productCategory)
    {
        if (empty($productCategory)) {
            Flash::error(__("sistema.ItemNotExist"));

            return redirect(route('productCategories.index'));
        }

        return view('product_categories.edit')->with('productCategory', $productCategory);
    }

    /**
     * Update the specified ProductCategory in storage.
     *
     * @param  int              $id
     * @param UpdateProductCategoryRequest $request
     *
     * @return Response
     */
    public function update(ProductCategory $productCategory, UpdateProductCategoryRequest $request)
    {

        if (empty($productCategory)) {
            Flash::error(__("sistema.ItemNotExist"));

            return redirect(route('productCategories.index'));
        }

        $imageRequest = $request->file('photo');

        $path = UploadStorage::storePublicly($imageRequest, '/imagens/categoria');

        $input = $request->all();
        $input["photo"] = $path;

        $this->productCategoryRepository->update($input, $productCategory->id);

        Flash::success('Categoria alterada com sucesso!');

        return redirect(route('productCategories.index'));
    }

    /**
     * Remove the specified ProductCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(ProductCategory $productCategory)
    {

        if (empty($productCategory)) {
            Flash::error('Produto não encontrado!');

            return redirect(route('productCategories.index'));
        }

        if (!empty($this->productRepository->findWhere(["product_category_id"=>$productCategory->id])->first())) {
            Flash::error(__("sistema.ItemEstaSendoUsado"));

            return redirect(route('productCategories.index'));
        }

        $productCategory->delete();

        Flash::success(__("sistema.ItemDeleted"));

        return redirect(route('productCategories.index'));
    }

    public function export()
    {
        return Excel::download(new ProductsCategoryExport(),
            'products_category.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
