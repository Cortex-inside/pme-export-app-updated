<?php

namespace PMEexport\Http\Controllers;

use Illuminate\Http\Request;
use PMEexport\Models\Certificate;
use PMEexport\Models\CertificateCategory;
use PMEexport\Models\ProductCategory;

class SiteController extends Controller
{
    public function index()
    {
        $listProductCategories = ProductCategory::all();

        return view('site.index', compact('listProductCategories'));
    }

    public function produtos()
    {
        $listProductCategories = ProductCategory::all();

        return view('site.produtos.index', compact('listProductCategories'));
    }

    public function sobre()
    {
        return view('site.about');
    }

    public function contato()
    {
        return view('site.contato');
    }

    public function contatoEnvia(Request $request)
    {
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'mensagem' => 'required|string',
        ]);

        return redirect()->route('site.contato')->with('success', 'Mensagem enviada com sucesso!');
    }

    public function certificacaoOnline()
    {
        $listCertificateCategory = CertificateCategory::all();
        $listCertificate = Certificate::all();

        return view('site.certificacao.online', compact('listCertificateCategory', 'listCertificate'));
    }

    public function clubPme()
    {
        return view('site.certificacao.club');
    }

    public function parceiros()
    {
        return view('site.parceiros.index');
    }

    public function newsletter(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        return back()->with('success', 'Subscrito com sucesso!');
    }
}
