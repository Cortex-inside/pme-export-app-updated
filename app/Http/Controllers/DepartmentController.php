<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\CreateDepartmentRequest;
use PMEexport\Http\Requests\UpdateDepartmentRequest;
use PMEexport\Models\Department;
use PMEexport\Repositories\DepartmentRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DepartmentController extends AppBaseController
{
    /** @var  DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Department.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->departmentRepository->pushCriteria(new RequestCriteria($request));
        $departments = $this->departmentRepository->paginate();

        return view('departments.index')
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new Department.
     *
     * @return Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created Department in storage.
     *
     * @param CreateDepartmentRequest $request
     *
     * @return Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        Flash::success('Departamento salvo com sucesso.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Department $department)
    {
        if (empty($department)) {
            Flash::error('Departamento não encontrado');

            return redirect(route('departments.index'));
        }

        return view('departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified Department.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Department $department)
    {
        if (empty($department)) {
            Flash::error('Departamento não encontrado');

            return redirect(route('departments.index'));
        }

        return view('departments.edit')->with('department', $department);
    }

    /**
     * Update the specified Department in storage.
     *
     * @param  int              $id
     * @param UpdateDepartmentRequest $request
     *
     * @return Response
     */
    public function update(Department $department, UpdateDepartmentRequest $request)
    {

        if (empty($department)) {
            Flash::error('Departamento não encontrado');

            return redirect(route('departments.index'));
        }

        $department = $this->departmentRepository->update($request->all(), $department->id);

        Flash::success('Departamento atualizado com sucesso');

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Department $department)
    {
        if (empty($department)) {
            Flash::error('Departamento não encontrado');
            return redirect(route('departments.index'));
        }

        if (count($department->certificates)) {
            Flash::error(__("sistema.ItemEstaSendoUsado"));

            return redirect(route('departments.index'));
        }

        $department->delete();

        Flash::success('Departamento delatado com sucesso.');

        return redirect(route('departments.index'));
    }
}
