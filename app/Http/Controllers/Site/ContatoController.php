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

class ContatoController extends AppBaseController
{
    public function __construct()
    {

    }


    public function contato()
    {
        return redirect('/exchange');

        return view('site.contato');
    }
    public function contatoEnvia(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'mensagem' => 'required',
        ]);

        Flash::success('Mensagem enviada com sucesso.');

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Contato($request->all()));

        return redirect(route('site.contato'));
    }


}
