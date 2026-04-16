<?php

namespace PMEexport\Http\Controllers\Auth;

use PMEexport\Models\Company;
use Spatie\Permission\Models\Role;
use PMEexport\Models\Country;
use PMEexport\Models\District;
use PMEexport\Models\User;
use PMEexport\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use PMEexport\Repositories\DistrictRepository;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    private $districtRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DistrictRepository $districtRepository)
    {
        $this->middleware('guest');

        $this->districtRepository = $districtRepository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'country_id.required' => __("messages.country_id.required"),
            'companie_name.required' =>  __("messages.companie_name.required"),
            'email.required' =>  __("messages.email.required"),
            'name.required' =>  __("messages.name.required"),
            'password.required' =>  __("messages.password.required"),
        ];

        $listValidation = [
            'perfil' => 'required',
            'companie_name' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ];


        if($data["perfil"] == 1) {
            $listValidationPerfil = [
                'district_id' => 'required',
                'legal_situation_id' => 'required',
            ];

            $listValidation = array_merge($listValidation,$listValidationPerfil);
        }

        if($data["perfil"] == 2) {
            $listValidationPerfil = [
                'country_id' => 'required',
            ];

            $listValidation = array_merge($listValidation,$listValidationPerfil);
        }

        return Validator::make($data, $listValidation, $messages);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function showRegistrationForm()
    {
        $districts = $this->districtRepository->all();

        $countrys = Country::all();

        return view("auth.register",compact('districts','countrys'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    protected function create(array $data)
    {

        if($data["perfil"] == 1) {
            $status = 5;
            $type = 1; //LOCAL
        }
        if($data["perfil"] == 2) {
            $status = 1;
            $type = 2; //ESTRANGEIRA
        }

        $company = Company::create([
            'name' => $data['companie_name'],
            'status' => $status,
            'type' => $type,
            'legal_situation_id' => $data['legal_situation_id'],
            'district_id' => $data['district_id'],
        ]);

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company_id' => $company->id,
            'password' => Hash::make($data['password']),
        ]);

        if($data["perfil"] == 1) {
            $role = Role::findByName('empresa');
        }
        if($data["perfil"] == 2) {
            $role = Role::findByName('empresa_estrangeira');
        }
        $user->assignRole($role);

        return $user;

    }
}
