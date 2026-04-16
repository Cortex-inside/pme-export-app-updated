<?php

namespace PMEexport\Http\Controllers\Site;

use PMEexport\Http\Requests\CreateCaeRequest;
use PMEexport\Http\Requests\UpdateCaeRequest;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Services\ProductCategoryService;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HomeController extends AppBaseController
{
    private $categoryService;

    public function __construct(ProductCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function index()
    {
        $listProductCategories = $this->categoryService->getAll();

        return view('site.index')->with(["listProductCategories"=>$listProductCategories]);
    }
    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function about()
    {
        return view('site.about');
    }

}
