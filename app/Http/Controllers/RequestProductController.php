<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateRequestProductRequest;
use PMEexport\Http\Requests\UpdateRequestProductRequest;
use PMEexport\Repositories\RequestAnnouncementRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RequestProductController extends AppBaseController
{
    /** @var  RequestAnnouncementRepository */
    private $requestProductRepository;

    public function __construct(RequestAnnouncementRepository $requestProductRepo)
    {
        $this->requestProductRepository = $requestProductRepo;
    }

    /**
     * Display a listing of the RequestAnnouncement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->requestProductRepository->pushCriteria(new RequestCriteria($request));
        $requestProducts = $this->requestProductRepository->all();

        return view('request_products.index')
            ->with('requestProducts', $requestProducts);
    }

    /**
     * Show the form for creating a new RequestAnnouncement.
     *
     * @return Response
     */
    public function create()
    {
        return view('request_products.create');
    }

    /**
     * Store a newly created RequestAnnouncement in storage.
     *
     * @param CreateRequestProductRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestProductRequest $request)
    {
        $input = $request->all();

        $requestProduct = $this->requestProductRepository->create($input);

        Flash::success('Request Product saved successfully.');

        return redirect(route('requestProducts.index'));
    }

    /**
     * Display the specified RequestAnnouncement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requestProduct = $this->requestProductRepository->find($id);

        if (empty($requestProduct)) {
            Flash::error('Request Product not found');

            return redirect(route('requestProducts.index'));
        }

        return view('request_products.show')->with('requestProduct', $requestProduct);
    }

    /**
     * Show the form for editing the specified RequestAnnouncement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requestProduct = $this->requestProductRepository->find($id);

        if (empty($requestProduct)) {
            Flash::error('Request Product not found');

            return redirect(route('requestProducts.index'));
        }

        return view('request_products.edit')->with('requestProduct', $requestProduct);
    }

    /**
     * Update the specified RequestAnnouncement in storage.
     *
     * @param  int              $id
     * @param UpdateRequestProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequestProductRequest $request)
    {
        $requestProduct = $this->requestProductRepository->find($id);

        if (empty($requestProduct)) {
            Flash::error('Request Product not found');

            return redirect(route('requestProducts.index'));
        }

        $requestProduct = $this->requestProductRepository->update($request->all(), $id);

        Flash::success('Request Product updated successfully.');

        return redirect(route('requestProducts.index'));
    }

    /**
     * Remove the specified RequestAnnouncement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requestProduct = $this->requestProductRepository->find($id);

        if (empty($requestProduct)) {
            Flash::error('Request Product not found');

            return redirect(route('requestProducts.index'));
        }

        $this->requestProductRepository->delete($id);

        Flash::success('Request Product deleted successfully.');

        return redirect(route('requestProducts.index'));
    }
}
