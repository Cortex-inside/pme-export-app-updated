<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Criteria\CompanyCertificateByStatusCriteria;
use PMEexport\Http\Requests\CreateCompanyCertificateRequest;
use PMEexport\Http\Requests\UpdateCompanyCertificateRequest;
use PMEexport\Repositories\CompanyCertificateRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CompanyCertificateController extends AppBaseController
{
    /** @var  CompanyCertificateRepository */
    private $companyCertificateRepository;

    public function __construct(CompanyCertificateRepository $companyCertificateRepo)
    {
        $this->companyCertificateRepository = $companyCertificateRepo;
    }

    /**
     * Display a listing of the CompanyCertificate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyCertificateRepository->pushCriteria(new RequestCriteria($request));
        $this->companyCertificateRepository->pushCriteria(new CompanyCertificateByStatusCriteria(0));
        $companyCertificates = $this->companyCertificateRepository->paginate(50);

        return view('company_certificates.index')
            ->with('companyCertificates', $companyCertificates);
    }
    public function pending(Request $request)
    {
        $this->companyCertificateRepository->pushCriteria(new RequestCriteria($request));
        $this->companyCertificateRepository->pushCriteria(new CompanyCertificateByStatusCriteria(1));
        $companyCertificates = $this->companyCertificateRepository->paginate(50);

        return view('company_certificates.index')
            ->with('companyCertificates', $companyCertificates);
    }
    public function approved(Request $request)
    {
        $this->companyCertificateRepository->pushCriteria(new RequestCriteria($request));
        $this->companyCertificateRepository->pushCriteria(new CompanyCertificateByStatusCriteria(3));
        $companyCertificates = $this->companyCertificateRepository->paginate(50);

        return view('company_certificates.index')
            ->with('companyCertificates', $companyCertificates);
    }

    public function disapproved(Request $request)
    {
        $this->companyCertificateRepository->pushCriteria(new RequestCriteria($request));
        $this->companyCertificateRepository->pushCriteria(new CompanyCertificateByStatusCriteria(4));
        $companyCertificates = $this->companyCertificateRepository->paginate(50);

        return view('company_certificates.index')
            ->with('companyCertificates', $companyCertificates);
    }
    public function inProgress(Request $request)
    {
        $this->companyCertificateRepository->pushCriteria(new RequestCriteria($request));
        $this->companyCertificateRepository->pushCriteria(new CompanyCertificateByStatusCriteria(2));
        $companyCertificates = $this->companyCertificateRepository->paginate(50);

        return view('company_certificates.index')
            ->with('companyCertificates', $companyCertificates);
    }

    /**
     * Show the form for creating a new CompanyCertificate.
     *
     * @return Response
     */
    public function create()
    {
        return view('company_certificates.create');
    }

    /**
     * Store a newly created CompanyCertificate in storage.
     *
     * @param CreateCompanyCertificateRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyCertificateRequest $request)
    {
        $input = $request->all();

        $companyCertificate = $this->companyCertificateRepository->create($input);

        Flash::success('Company Certificate saved successfully.');

        return redirect(route('companyCertificates.index'));
    }

    /**
     * Display the specified CompanyCertificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $companyCertificate = $this->companyCertificateRepository->find($id);

        if (empty($companyCertificate)) {
            Flash::error('Company Certificate not found');

            return redirect(route('companyCertificates.index'));
        }

        return view('company_certificates.show')->with('companyCertificate', $companyCertificate);
    }

    /**
     * Show the form for editing the specified CompanyCertificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $companyCertificate = $this->companyCertificateRepository->find($id);

        if (empty($companyCertificate)) {
            Flash::error('Company Certificate not found');

            return redirect(route('companyCertificates.index'));
        }

        return view('company_certificates.edit')->with('companyCertificate', $companyCertificate);
    }

    /**
     * Update the specified CompanyCertificate in storage.
     *
     * @param  int              $id
     * @param UpdateCompanyCertificateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyCertificateRequest $request)
    {
        $companyCertificate = $this->companyCertificateRepository->find($id);

        if (empty($companyCertificate)) {
            Flash::error('Company Certificate not found');

            return redirect(route('companyCertificates.index'));
        }

        $companyCertificate = $this->companyCertificateRepository->update($request->all(), $id);

        Flash::success('Company Certificate updated successfully.');

        return redirect(route('companyCertificates.index'));
    }

    /**
     * Remove the specified CompanyCertificate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $companyCertificate = $this->companyCertificateRepository->find($id);

        if (empty($companyCertificate)) {
            Flash::error('Company Certificate not found');

            return redirect(route('companyCertificates.index'));
        }

        $this->companyCertificateRepository->delete($id);

        Flash::success('Company Certificate deleted successfully.');

        return redirect(route('companyCertificates.index'));
    }

    public function startAnalyze($id)
    {
        $companyCertificate = $this->companyCertificateRepository->find($id);

        if (empty($companyCertificate)) {
            Flash::error('Pedido de certificado não encontrado.');

            return redirect(route('companyCertificates.index'));
        }
        $arrayFinal = array('status' => 2);
        $this->companyCertificateRepository->update($arrayFinal,$companyCertificate->id);

        Flash::success('Análise do pedido de certificado iniciada.');

        return redirect()->back();
    }

    public function approve($id)
    {
        $companyCertificate = $this->companyCertificateRepository->find($id);

        if (empty($companyCertificate)) {
            Flash::error('Pedido de certificado não encontrado.');

            return redirect(route('companyCertificates.index'));
        }
        $arrayFinal = array('status' => 3);
        $this->companyCertificateRepository->update($arrayFinal,$companyCertificate->id);

        Flash::success('Pedido de certificado aprovado com sucesso.');

        return redirect()->back();
    }

    public function disapprove(Request $request)
    {
        $input = $request->all();
        $companyCertificate = $this->companyCertificateRepository->find($input['company_certificate_id']);

        if (empty($companyCertificate)) {
            Flash::error('Pedido de certificado não encontrado.');

            return redirect(route('companyCertificates.index'));
        }
        $arrayFinal = array('status' => 4, 'motive_disapprove' => $input['motive_disapprove']);
        $this->companyCertificateRepository->update($arrayFinal,$companyCertificate->id);

        Flash::success('Pedido de certificado reprovado com sucesso.');

        return redirect()->back();
    }
}
