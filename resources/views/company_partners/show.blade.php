@extends('layouts.admin.index')
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        <div class="">
            @can('companyPartners.edit')
            <a href="{!! route('companyPartners.edit', [$companyPartner->id]) !!}" class='btn
                    btn-info'><i class="far fa-edit"></i> Editar</a>&nbsp;
            @endcan
        </div>
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("companyPartners.index")}}">Sócio da empresa</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Sócio da empresa</h6>
        <div class="card-body">
            @include('company_partners.show_fields')

        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('companyPartners.index') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>
@endsection
