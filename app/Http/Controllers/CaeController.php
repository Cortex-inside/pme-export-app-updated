<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateCaeRequest;
use PMEexport\Http\Requests\UpdateCaeRequest;
use PMEexport\Models\Cae;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CaeController extends AppBaseController
{
    /** @var  CaeRepository */
    private $caeRepository;

    public function __construct(CaeRepository $caeRepo)
    {
        $this->caeRepository = $caeRepo;
    }

    /**
     * Display a listing of the Cae.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->caeRepository->pushCriteria(new RequestCriteria($request));
        $caes = $this->caeRepository->paginate();

        return view('caes.index')
            ->with('caes', $caes);
    }

    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function create()
    {
        return view('caes.create');
    }

    /**
     * Store a newly created Cae in storage.
     *
     * @param CreateCaeRequest $request
     *
     * @return Response
     */
    public function store(CreateCaeRequest $request)
    {
        $input = $request->all();

        $cae = $this->caeRepository->create($input);

        Flash::success('CAE criado com sucesso.');

        return redirect(route('caes.index'));
    }

    /**
     * Display the specified Cae.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Cae $cae)
    {

        if (empty($cae)) {
            Flash::error('CAE não encontrada.');

            return redirect(route('caes.index'));
        }

        return view('caes.show')->with('cae', $cae);
    }

    /**
     * Show the form for editing the specified Cae.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Cae $cae)
    {

        if (empty($cae)) {
            Flash::error('CAE não encontrada.');

            return redirect(route('caes.index'));
        }

        return view('caes.edit')->with('cae', $cae);
    }

    /**
     * Update the specified Cae in storage.
     *
     * @param  int              $id
     * @param UpdateCaeRequest $request
     *
     * @return Response
     */
    public function update(Cae $cae, UpdateCaeRequest $request)
    {
        if (empty($cae)) {
            Flash::error('CAE não encontrada.');

            return redirect(route('caes.index'));
        }

        $cae = $this->caeRepository->update($request->all(), $cae->id);

        Flash::success('CAE atualizada com sucesso.');

        return redirect(route('caes.index'));
    }

    /**
     * Remove the specified Cae from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Cae $cae)
    {

        if (empty($cae)) {
            Flash::error('CAE não encontrada.');

            return redirect(route('caes.index'));
        }

        $cae->delete();

        Flash::success('CAE deletada com sucesso.');

        return redirect(route('caes.index'));
    }
}
