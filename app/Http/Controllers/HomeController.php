<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        if(auth()->user()->hasRole("empresa") OR auth()->user()->hasRole("empresa_estrangeira")) {
            if(auth()->user()->hasRole("empresa_estrangeira")){
                return redirect(route('exchange.index'));
            }

            if(Auth::user()->company->status == 5 || Auth::user()->company->status == 4){
                return redirect(route('sysCompany.complementRegister'));
            }

            return redirect(route('exchange.index'));
        }

        $companies = DB::select("SELECT COUNT(c.id) as qtd FROM companies c");
        $companies_pendentes = DB::select("SELECT COUNT(c.id) as qtd FROM companies c where status = 1");
        $companies_aprovadas = DB::select("SELECT COUNT(c.id) as qtd FROM companies c where status = 6");
        $certificates = DB::select("SELECT COUNT(cc.id) as qtd FROM company_certificates cc");
        $request_announcements = DB::select("SELECT COUNT(ra.id) as qtd FROM request_announcements ra");

        $companies_all = $companies[0]->qtd;
        $companies_pendentes = $companies_pendentes[0]->qtd;
        $companies_aprovadas = $companies_aprovadas[0]->qtd;
        $certificates_all = $certificates[0]->qtd;
        $request_announcements_all = $request_announcements[0]->qtd;


        $data['companies_all'] = $companies_all;
        $data['companies_pendentes'] = $companies_pendentes;
        $data['companies_aprovadas'] = $companies_aprovadas;
        $data['certificates_all'] = $certificates_all;
        $data['request_announcements_all'] = $request_announcements_all;


        return view('dashboard.dashboard',compact('data'));
    }
}
