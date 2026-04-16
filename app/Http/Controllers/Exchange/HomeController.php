<?php

namespace PMEexport\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use PMEexport\Http\Controllers\Controller;
use PMEexport\Services\ExchangeService;

class HomeController extends Controller
{

    private $exchangeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExchangeService $exchangeService)
    {
        $this->middleware('auth');

        $this->exchangeService = $exchangeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->exchangeService->listProducts();
    }
}
