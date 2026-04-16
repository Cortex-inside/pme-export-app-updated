<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCompanyCertificateMessageRequest;
use PMEexport\Http\Requests\UpdateCompanyCertificateMessageRequest;
use PMEexport\Repositories\CompanyCertificateMessageRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyCertificateMessageController extends AppBaseController
{
    /** @var  CompanyCertificateMessageRepository */
    private $companyCertificateMessageRepository;

    public function __construct(CompanyCertificateMessageRepository $companyCertificateMessageRepo)
    {
        $this->companyCertificateMessageRepository = $companyCertificateMessageRepo;
    }

    /**
     * Display a listing of the CompanyCertificateMessage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyCertificateMessageRepository->pushCriteria(new RequestCriteria($request));
        $companyCertificateMessages = $this->companyCertificateMessageRepository->all();

        return view('company_certificate_messages.index')
            ->with('companyCertificateMessages', $companyCertificateMessages);
    }

    /**
     * Show the form for creating a new CompanyCertificateMessage.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_certificate_messages.create');
    }

    /**
     * Store a newly created CompanyCertificateMessage in storage.
     *
     * @param CreateCompanyCertificateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyCertificateMessageRequest $request)
    {
        $input = $request->all();

        $companyCertificateMessage = $this->companyCertificateMessageRepository->create($input);

        Flash::success('Company Certificate Message saved successfully.');

        return redirect(route('companyCertificateMessages.index'));
    }

    /**
     * Display the specified CompanyCertificateMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyCertificateMessage = $this->companyCertificateMessageRepository->find($id);

        if (empty($companyCertificateMessage)) {
            Flash::error('Company Certificate Message not found');

            return redirect(route('companyCertificateMessages.index'));
        }

        return view('company_certificate_messages.show')->with('companyCertificateMessage', $companyCertificateMessage);
    }

    /**
     * Show the form for editing the specified CompanyCertificateMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyCertificateMessage = $this->companyCertificateMessageRepository->find($id);

        if (empty($companyCertificateMessage)) {
            Flash::error('Company Certificate Message not found');

            return redirect(route('companyCertificateMessages.index'));
        }

        return view('company_certificate_messages.edit')->with('companyCertificateMessage', $companyCertificateMessage);
    }

    /**
     * Update the specified CompanyCertificateMessage in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyCertificateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyCertificateMessageRequest $request)
    {
        $companyCertificateMessage = $this->companyCertificateMessageRepository->find($id);

        if (empty($companyCertificateMessage)) {
            Flash::error('Company Certificate Message not found');

            return redirect(route('companyCertificateMessages.index'));
        }

        $companyCertificateMessage = $this->companyCertificateMessageRepository->update($request->all(), $id);

        Flash::success('Company Certificate Message updated successfully.');

        return redirect(route('companyCertificateMessages.index'));
    }

    /**
     * Remove the specified CompanyCertificateMessage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyCertificateMessage = $this->companyCertificateMessageRepository->find($id);

        if (empty($companyCertificateMessage)) {
            Flash::error('Company Certificate Message not found');

            return redirect(route('companyCertificateMessages.index'));
        }

        $this->companyCertificateMessageRepository->delete($id);

        Flash::success('Company Certificate Message deleted successfully.');

        return redirect(route('companyCertificateMessages.index'));
    }
}
