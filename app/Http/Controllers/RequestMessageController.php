<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateRequestMessageRequest;
use PMEexport\Http\Requests\UpdateRequestMessageRequest;
use PMEexport\Repositories\RequestMessageRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RequestMessageController extends AppBaseController
{
    /** @var  RequestMessageRepository */
    private $requestMessageRepository;

    public function __construct(RequestMessageRepository $requestMessageRepo)
    {
        $this->requestMessageRepository = $requestMessageRepo;
    }

    /**
     * Display a listing of the RequestMessage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->requestMessageRepository->pushCriteria(new RequestCriteria($request));
        $requestMessages = $this->requestMessageRepository->all();

        return view('request_messages.index')
            ->with('requestMessages', $requestMessages);
    }

    /**
     * Show the form for creating a new RequestMessage.
     *
     * @return Response
     */
    public function create()
    {
        return view('request_messages.create');
    }

    /**
     * Store a newly created RequestMessage in storage.
     *
     * @param CreateRequestMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestMessageRequest $request)
    {
        $input = $request->all();

        $requestMessage = $this->requestMessageRepository->create($input);

        Flash::success('Request Message saved successfully.');

        return redirect(route('requestMessages.index'));
    }

    /**
     * Display the specified RequestMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requestMessage = $this->requestMessageRepository->find($id);

        if (empty($requestMessage)) {
            Flash::error('Request Message not found');

            return redirect(route('requestMessages.index'));
        }

        return view('request_messages.show')->with('requestMessage', $requestMessage);
    }

    /**
     * Show the form for editing the specified RequestMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requestMessage = $this->requestMessageRepository->find($id);

        if (empty($requestMessage)) {
            Flash::error('Request Message not found');

            return redirect(route('requestMessages.index'));
        }

        return view('request_messages.edit')->with('requestMessage', $requestMessage);
    }

    /**
     * Update the specified RequestMessage in storage.
     *
     * @param  int              $id
     * @param UpdateRequestMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestMessageRequest $request)
    {
        $requestMessage = $this->requestMessageRepository->find($id);

        if (empty($requestMessage)) {
            Flash::error('Request Message not found');

            return redirect(route('requestMessages.index'));
        }

        $requestMessage = $this->requestMessageRepository->update($request->all(), $id);

        Flash::success('Request Message updated successfully.');

        return redirect(route('requestMessages.index'));
    }

    /**
     * Remove the specified RequestMessage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requestMessage = $this->requestMessageRepository->find($id);

        if (empty($requestMessage)) {
            Flash::error('Request Message not found');

            return redirect(route('requestMessages.index'));
        }

        $this->requestMessageRepository->delete($id);

        Flash::success('Request Message deleted successfully.');

        return redirect(route('requestMessages.index'));
    }
}
