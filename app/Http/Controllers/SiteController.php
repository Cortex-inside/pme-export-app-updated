<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Models\ProductCategory;

class SiteController extends Controller
{
    public function index()
    {
        $listProductCategories = ProductCategory::all();

        return view('site.index', compact('listProductCategories'));
    }
}
