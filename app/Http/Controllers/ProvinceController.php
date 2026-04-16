<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateProvinceRequest;
use PMEexport\Http\Requests\UpdateProvinceRequest;
use PMEexport\Models\Province;
use PMEexport\Repositories\ProvinceRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProvinceController extends AppBaseController
{
    /** @var  ProvinceRepository */
    private $provinceRepository;

    public function __construct(ProvinceRepository $provinceRepo)
    {
        $this->provinceRepository = $provinceRepo;
    }

    /**
     * Display a listing of the Province.
     *
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)
    {
        $this->provinceRepository->pushCriteria(new RequestCriteria($request));
        $provinces = $this->provinceRepository->paginate();

        return view('provinces.index')
            ->with('provinces', $provinces);
    }

    /**
     * Show the form for creating a new Province.
     *
     * @return Response
     */
    public function create()
    {
        return view('provinces.create');
    }

    /**
     * Store a newly created Province in storage.
     *
     * @param CreateProvinceRequest $request
     *
     * @return Response
     */
    public function store(CreateProvinceRequest $request)
    {
        $input = $request->all();

        $province = $this->provinceRepository->create($input);

        Flash::success('Província criada com sucesso.');

        return redirect(route('provinces.index'));
    }

    /**
     * Display the specified Province.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Province $province)
    {

        if (empty($province)) {
            Flash::error('Provincia não encontrada');

            return redirect(route('provinces.index'));
        }

        return view('provinces.show')->with('province', $province);
    }

    /**
     * Show the form for editing the specified Province.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Province $province)
    {

        if (empty($province)) {
            Flash::error('Provincia não encontrada');

            return redirect(route('provinces.index'));
        }

        return view('provinces.edit')->with('province', $province);
    }

    /**
     * Update the specified Province in storage.
     *
     * @param  int              $id
     * @param UpdateProvinceRequest $request
     *
     * @return Response
     */
    public function update(Province $province, UpdateProvinceRequest $request)
    {

        if (empty($province)) {
            Flash::error('Provincia não encontrada');

            return redirect(route('provinces.index'));
        }

        $this->provinceRepository->update($request->all(), $province->id);

        Flash::success('Província atualizada com sucesso.');

        return redirect(route('provinces.index'));
    }

    /**
     * Remove the specified Province from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Province $province)
    {

        if (empty($province)) {
            Flash::error('Provincia não encontrada');

            return redirect(route('provinces.index'));
        }

        $province->delete();

        Flash::success('Província deletada com sucesso.');

        return redirect(route('provinces.index'));
    }
}
