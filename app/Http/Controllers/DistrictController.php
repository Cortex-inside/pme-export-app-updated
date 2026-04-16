<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateDistrictRequest;
use PMEexport\Http\Requests\UpdateDistrictRequest;
use PMEexport\Models\District;
use PMEexport\Repositories\DistrictRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Repositories\ProvinceRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DistrictController extends AppBaseController
{
    /** @var  DistrictRepository */
    private $districtRepository;
    /**
     * @var ProvinceRepository
     */
    private $provinceRepository;

    public function __construct(DistrictRepository $districtRepo, ProvinceRepository $provinceRepository)
    {
        $this->districtRepository = $districtRepo;
        $this->provinceRepository = $provinceRepository;
    }

    /**
     * Display a listing of the District.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->districtRepository->pushCriteria(new RequestCriteria($request));
        $districts = $this->districtRepository->paginate();

        return view('districts.index')
            ->with('districts', $districts);
    }

    /**
     * Show the form for creating a new District.
     *
     * @return Response
     */
    public function create()
    {
        $listProvinces = $this->provinceRepository->all();
        return view('districts.create')->with('listProvinces', $listProvinces);
    }

    /**
     * Store a newly created District in storage.
     *
     * @param CreateDistrictRequest $request
     *
     * @return Response
     */
    public function store(CreateDistrictRequest $request)
    {
        $input = $request->all();

        $district = $this->districtRepository->create($input);

        Flash::success('Distrito criado com sucesso.');

        return redirect(route('districts.index'));
    }

    /**
     * Display the specified District.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(District $district)
    {

        if (empty($district)) {
            Flash::error('Distrito não encontrado');

            return redirect(route('districts.index'));
        }

        return view('districts.show')->with('district', $district);
    }

    /**
     * Show the form for editing the specified District.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(District $district)
    {

        if (empty($district)) {
            Flash::error('Distrito não encontrado');

            return redirect(route('districts.index'));
        }

        $listProvinces = $this->provinceRepository->all();

        return view('districts.edit')->with(['district' => $district, 'listProvinces' => $listProvinces]);
    }

    /**
     * Update the specified District in storage.
     *
     * @param  int              $id
     * @param UpdateDistrictRequest $request
     *
     * @return Response
     */
    public function update(District $district, UpdateDistrictRequest $request)
    {

        if (empty($district)) {
            Flash::error('Distrito não encontrado');

            return redirect(route('districts.index'));
        }

        $district = $this->districtRepository->update($request->all(), $district->id);

        Flash::success('Distrito atualizado com sucesso.');

        return redirect(route('districts.index'));
    }

    /**
     * Remove the specified District from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(District $district)
    {

        if (empty($district)) {
            Flash::error('Distrito não encontrado');

            return redirect(route('districts.index'));
        }

        $district->delete();

        Flash::success('Distrito deletado com sucesso.');

        return redirect(route('districts.index'));
    }
}
