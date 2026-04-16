<?php

namespace PMEexport\Http\Controllers;

use PMEexport\Models\User;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PMEexport\Services\UserService;
use Spatie\Permission\Models\Role;

class GroupUserController extends AppBaseController
{
    public function index(){
        $groups = Role::all()->pluck('name', 'id');
        return view('group_user.index',compact('groups'));
    }
}
