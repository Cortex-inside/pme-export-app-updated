<?php

namespace PMEexport\Http\Controllers\Exchange;

use Illuminate\Http\Request;
use PMEexport\Http\Controllers\Controller;
use PMEexport\Models\CompanyAnnouncement;
use PMEexport\Models\Product;
use PMEexport\Models\RequestAnnouncement;
use PMEexport\Services\ExchangeRequestService;
use PMEexport\Services\ExchangeService;

class RequestController extends Controller
{

    private $exchangeRequestService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExchangeRequestService $exchangeRequestService)
    {
        $this->middleware('auth');

        $this->exchangeRequestService = $exchangeRequestService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->exchangeRequestService->listRequest();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviados()
    {
        return $this->exchangeRequestService->listEnviados();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos()
    {
        return $this->exchangeRequestService->listAll();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function recebidos()
    {
        return $this->exchangeRequestService->listRecebidos();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function fechados()
    {
        return $this->exchangeRequestService->listFechados();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(RequestAnnouncement $announcement)
    {
        return $this->exchangeRequestService->detail($announcement);

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelation(RequestAnnouncement $announcement, Request $request)
    {
        return $this->exchangeRequestService->cancelation($announcement, $request);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function closed(RequestAnnouncement $announcement, Request $request)
    {
        return $this->exchangeRequestService->closed($announcement, $request);

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmCloseRequest(CompanyAnnouncement $announcement)
    {
        return $this->exchangeRequestService->confirmCloseRequest($announcement);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function closeRequest(Request $request, CompanyAnnouncement $announcement)
    {
        return $this->exchangeRequestService->closeRequest($request, $announcement);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function offerRequest(CompanyAnnouncement $announcement)
    {
        return $this->exchangeRequestService->offerRequest($announcement);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function offerStoreRequest(CompanyAnnouncement $announcement, Request $request)
    {
        return $this->exchangeRequestService->offerStoreRequest($announcement, $request);
    }
    public function sendMessageRequest(Request $request)
    {
        return $this->exchangeRequestService->sendMessageRequest($request);
    }
}
