<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Http\Requests\UserStoreRequest;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;
use PMEexport\Http\Requests\CreateCaeRequest;
use PMEexport\Http\Requests\UpdateCaeRequest;
use PMEexport\Http\Requests\UserUpdateRequest;
use PMEexport\Models\User;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use PMEexport\Repositories\DepartmentRepository;
use PMEexport\Services\UserService;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserController extends AppBaseController
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    public function __construct(UserService $userService, DepartmentRepository $departmentRepository)
    {
        $this->userService = $userService;
        $this->departmentRepository = $departmentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userService->listUsers();

        return view('users.index', compact('users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function indexEmpresa()
    {
        $users = $this->userService->listUsersEmpresa();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        $listDepartments = $this->departmentRepository->all();
        $user = new User();
        $selectedRoles = [];

        return view('users.create', compact('roles','listDepartments', 'user', 'selectedRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(UserStoreRequest $userRequest)
    {

        $this->userService->addNewUser($userRequest);

        Flash::success('Usuário atualizado com sucesso.');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(User $user)
    {
        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        return $this->userService->showUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {

        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }


        $roles = Role::all()->pluck('name', 'id');

        $selectedRoles = [];
        foreach($user->roles as $role) {
            $selectedRoles[] = $role->id;
        }

        $listDepartments = $this->departmentRepository->all();


        return view('users.edit', compact('user','roles','selectedRoles','listDepartments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function update(UserUpdateRequest $userRequest, User $user)
    {
        if (empty($user)) {
            Flash::error('Usuário não encontrado');

            return redirect(route('users.index'));
        }

        Flash::success('Usuário atualizado com sucesso.');

        return $this->userService->editUser($userRequest, $user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        return $this->userService->deleteUser($user);
    }

    public function changePassword(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('users.change_password', compact('user','roles'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $return = $this->userService->updatePassword($request, $user);
        return $return;
    }
}
