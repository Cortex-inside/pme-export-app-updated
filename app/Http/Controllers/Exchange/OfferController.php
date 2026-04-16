<?php

namespace PMEexport\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use PMEexport\Http\Controllers\Controller;
use PMEexport\Models\CompanyAnnouncement;
use PMEexport\Models\Product;
use PMEexport\Services\ExchangeService;

class OfferController extends Controller
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
    public function detail(CompanyAnnouncement $announcement)
    {
        return $this->exchangeService->detailProduct($announcement);
    }
}
