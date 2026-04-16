<?php
/**
 * Created by PhpStorm.
 * User: CELTAPHP
 * Date: 21/12/2016
 * Time: 13:15
 */

namespace PMEexport\Services;


use Laracasts\Flash\Flash;
use PMEexport\Repositories\UserRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{

    /**
     * @var Role
     */
    private $role;
    /**
     * @var Permission
     */
    private $permission;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(Role $role, Permission $permission, UserRepository $userRepository)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->userRepository = $userRepository;
    }

    public function listRoles(){
        $roles = $this->role->orderBy('id', 'desc')->paginate();
        return view('roles.index', compact('roles'));
    }

    public function showRolePermission($role_id){
        $role = $this->role->findOrFail($role_id);
        $permissions = $this->permission->all();
        return view('roles.show', compact('role','permissions'));
    }

    public function permissionUpdate($request, $id)
    {
        $data = $request->all();
        $role = Role::findById($id);
        unset($data["_method"]);
        unset($data["_token"]);

        $permissions = array();
        if(count($data) > 0){
                foreach ($data as $key=>$value){
                    if($value != "0"){
                        $permissions[] = $key;
                    }
                }
            $role->syncPermissions($permissions);

            Flash::success('Item atualizado com sucesso.');

            return redirect()->route('roles.show',$id)->with('message', 'Permissões atualizadas com sucesso');
        }
    }
}
