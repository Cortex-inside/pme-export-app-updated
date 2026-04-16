<?php

namespace PMEexport\Http\Controllers\Auth;

use Illuminate\Http\Request;
use PMEexport\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use PMEexport\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, User $user)
    {
        if ($user->hasAnyRole(['superuser', 'admin', 'departamento', 'informatica', 'core', 'diretor'])) {
            return redirect()->route('dashboard');
        } elseif ($user->hasAnyRole(['empresa', 'empresa_estrangeira'])) {
            return redirect()->route('exchange.index');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
