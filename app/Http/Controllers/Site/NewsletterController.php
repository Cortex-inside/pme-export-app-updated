<?php

namespace PMEexport\Http\Controllers\Site;

use Illuminate\Support\Facades\Mail;
use PMEexport\Http\Requests\CreateCaeRequest;
use PMEexport\Http\Requests\UpdateCaeRequest;
use PMEexport\Mail\Contato;
use PMEexport\Repositories\CaeRepository;
use PMEexport\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NewsletterController extends AppBaseController
{
    public function __construct()
    {
    }


    public function contato()
    {
        return view('site.contato');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        Flash::success('Cadastrado com sucesso.');

        return redirect(route('site.index'));
    }


}
