<?php

namespace PMEexport\Http\Controllers\Site;

use PMEexport\Http\Controllers\AppBaseController;
use Flash;
use Response;

class ParceiroController extends AppBaseController
{

    public function __construct()
    {
    }

    /**
     * Show the form for creating a new Cae.
     *
     * @return Response
     */
    public function index()
    {
        return redirect('/exchange');

        return view("site.parceiros.index");
    }

}
