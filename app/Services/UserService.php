<?php
/**
 * Created by PhpStorm.
 * User: CELTAPHP
 * Date: 21/12/2016
 * Time: 13:15
 */

namespace PMEexport\Services;

use Laracasts\Flash\Flash;
use PMEexport\Criteria\UsersEmpresaSelectCriteria;
use PMEexport\Criteria\UsersSelectCriteria;
use PMEexport\Repositories\UserRepository;

class UserService
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers()
    {
        $this->userRepository->pushCriteria(new UsersSelectCriteria());

//        $users = $this->userRepository->paginate();
        $users = $this->userRepository->paginate();

        return $users;
    }
    public function listUsersEmpresa()
    {
        $this->userRepository->pushCriteria(new UsersEmpresaSelectCriteria());

//        $users = $this->userRepository->paginate();
        $users = $this->userRepository->paginate();

        return $users;
    }
    public function addNewUser($request)
    {
        $data = $request->all();

        if($data['role_id'] != 8) {
            $data["department_id"] = null;
        } else if ($data['role_id'] != 7) {
            $data["department_id"] = null;
        }

        $data["password"] = bcrypt($data["password"]);

        $newUser = $this->userRepository->create($data);

        if (isset($data['role_id'])) {
            $newUser->syncRoles([$data["role_id"]]);
        }

    }

    public function editUser($request, $user)
    {
        $data = $request->all();

        if($data['role_id'] != 8) {
            $data["department_id"] = null;
        } else if ($data['role_id'] != 7) {
            $data["department_id"] = null;
        }

        $this->userRepository->update($data, $user->id);

        $user->roles()->detach();

        if (isset($data['role_id'])) {
            $user->syncRoles([$data["role_id"]]);
        }

        return redirect()->route('users.index')->with('message', 'Item atualizado com sucesso.');

    }

    public function deleteUser($user)
    {
        //Verifica se o usuário pertence a alguma equipe
        $user->roles()->detach();
        $user->delete();

        Flash::error('Usuário excluído com sucesso!');

        return redirect()->route('users.index');
    }

    public function updatePassword($request, $user){
        $data = $request->all();
        if($data['password'] != $data['repassword']){
            return redirect()->route('users.change_password',$user->uuid)->with('error', 'As senhas não coencidem, informe a senha novamente.');
        }
        $data['password'] = bcrypt($data['password']);
        $this->userRepository->update($data, $user->id);
        return redirect()->route('users.show',$user->uuid)->with('message', 'Senha alterada com sucesso.');
    }

    public function showUser($user){
        return view('users.show', compact('user'));
    }

    public function all(){
        return $this->userRepository->all();
    }
}