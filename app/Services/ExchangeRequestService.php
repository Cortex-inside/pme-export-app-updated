<?php

/**
 * Created by PhpStorm.
 * User: Guilherme Dias
 * Date: 17/08/2018
 * Time: 13:36
 */

namespace PMEexport\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use PMEexport\Criteria\RequestAnnouncementEnviadosCriteria;
use PMEexport\Criteria\RequestAnnouncementFechadosCriteria;
use PMEexport\Criteria\RequestAnnouncementRecebidosCriteria;
use PMEexport\Criteria\RequestMessageCriteria;
use PMEexport\Repositories\CompanyAnnouncementRepository;
use PMEexport\Repositories\ProductRepository;
use PMEexport\Repositories\RequestAnnouncementRepository;
use PMEexport\Repositories\RequestMessageRepository;

class ExchangeRequestService
{
    /**
     * @var ProductRepository
     */
    private $companyAnnouncementRepository;
    private $requestAnnouncementRepository;
    private $requestMessageRepository;

    /**
     * ProductService constructor.
     */
    public function __construct(
        CompanyAnnouncementRepository $companyAnnouncementRepository,
        RequestMessageRepository $requestMessageRepository,
        RequestAnnouncementRepository $requestAnnouncementRepository
    ) {
        $this->companyAnnouncementRepository = $companyAnnouncementRepository;
        $this->requestAnnouncementRepository = $requestAnnouncementRepository;
        $this->requestMessageRepository = $requestMessageRepository;
    }

    public function listRequest()
    {
        $requests = $this->requestAnnouncementRepository->paginate();
        return view("exchange.request.index")->with(["requests" => $requests]);
    }

    public function listEnviados()
    {
        try {
            $this->requestAnnouncementRepository->pushCriteria(new RequestAnnouncementEnviadosCriteria());
            $requests = $this->requestAnnouncementRepository->paginate();
            return view("exchange.request.enviados")->with(["requests" => $requests]);
        } catch (\Exception $e) {
            return redirect()->route("exchange.index");
        }
    }
    public function listAll()
    {
        try {
            //            $this->requestAnnouncementRepository->pushCriteria(new RequestAnnouncementEnviadosCriteria());
            $requests = $this->requestAnnouncementRepository->paginate();
            return view("exchange.request.todos")->with(["requests" => $requests]);
        } catch (\Exception $e) {
            return redirect()->route("exchange.index");
        }
    }

    public function listRecebidos()
    {
        try {
            $this->requestAnnouncementRepository->pushCriteria(new RequestAnnouncementRecebidosCriteria());
            $requests = $this->requestAnnouncementRepository->paginate();
            return view("exchange.request.recebidos")->with(["requests" => $requests]);
        } catch (\Exception $e) {
            return redirect()->route("exchange.index");
        }
    }

    public function listFechados()
    {
        try {
            $this->requestAnnouncementRepository->pushCriteria(new RequestAnnouncementFechadosCriteria());
            $requests = $this->requestAnnouncementRepository->paginate();
            return view("exchange.request.fechados")->with(["requests" => $requests]);
        } catch (\Exception $e) {
            return redirect()->route("exchange.index");
        }
    }
    public function detail($announcement)
    {

        $this->requestMessageRepository->pushCriteria(new RequestMessageCriteria());
        $messages = $this->requestMessageRepository
            ->findWhere(["request_announcement_id" => $announcement->id])
            ->all();

        return view('exchange.request.details', compact('messages', 'announcement'));
    }
    public function cancelation($announcement, Request $request)
    {
        Flash::error('Pedido cancelado com sucesso!');

        $announcement->status = 2;
        $announcement->canceled_at = date("Y-m-d H:i:s");
        $announcement->canceled_message = $request->input("cancel_message");
        $announcement->save();

        return redirect()->route("exchange.requests");
    }
    public function closed($announcement, Request $request)
    {
        Flash::success('Pedido aprovado com sucesso!');

        $announcement->status = 3;
        $announcement->closed_at = date("Y-m-d H:i:s");
        $announcement->save();

        return redirect()->route("exchange.requests");
    }
    public function confirmCloseRequest($announcement)
    {
        return view('exchange.request.confirm-close')
            ->with('announcement', $announcement);
    }

    public function offerRequest($announcement)
    {
        return view('exchange.request.offer')
            ->with('announcement', $announcement);
    }


    public function offerStoreRequest($product, Request $request)
    {
        $announcement = $this->companyAnnouncementRepository->findWhere(["uuid" => $product])->first();

        return view('exchange.request.create')
            ->with('announcement', $announcement);
    }

    public function closeRequest(Request $request, $announcement)
    {
        $company_id = Auth::user()->company->id;
        $data = $request->all();

        $price                      = $request->input('price');
        $amount                     = $request->input('amount');
        $unit_of_measure_or_weight  = $request->input('unit_of_measure_or_weight');
        $local_entrega              = $request->input('local_entrega');
        $logistica                  = $request->input('logistica');
        $description                = $request->input('description');

        $data = [
            "company_announcements_id"  => $announcement->id,
            "company_id"                => $announcement->company_id,
            "company_id_request"        => $company_id,
            "product_id"                => $announcement->product_id,
            "unit_of_measure_or_weight" => ($unit_of_measure_or_weight) ? $unit_of_measure_or_weight : $announcement->unit_of_measure_or_weight,
            "amount"                    => ($amount) ? $amount : $announcement->amount,
            "local_entrega"             => ($local_entrega) ? $local_entrega : $announcement->local_entrega,
            "logistica"                 => ($logistica) ? $logistica : $announcement->logistica,
            "description"               => ($description) ? $description : $announcement->description,
            "coin"                      => $announcement->coin,
            "price"                     => ($price) ? $price : $announcement->price,
            "status"                    => 1,
            //            "market_type" => $announcement->company_id,
            //            "type_of_exposure" => $announcement->company_id,
            //            "visibility" => $announcement->company_id,
            //            "payment_model" => $announcement->company_id,
        ];

        $this->requestAnnouncementRepository->create($data);

        Flash::success('Pedido realizado com sucesso!');

        return redirect()->route("exchange.requests");
    }
    public function getMessages()
    {
        return $this->requestMessageRepository->all();
    }
    public function sendMessageRequest(Request $request)
    {
        $input  = $request->all();

        $userId = Auth::user()->id;

        if (auth()->user()->hasAnyRole(['departamento', 'informatica', 'core', 'diretor', 'superuser', 'admin'])) {
            $input["type"] = 1;
        }

        $input['user_id'] = $userId;

        $this->requestMessageRepository->create($input);

        return redirect()->back();
    }
}
