@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("sysCompany.certificates.myCertificates")}}">Meus certificados</a></li>
            <li class="breadcrumb-item active">Listar</li>

        </ol>
    </div>
@endsection

@section('content')

    <div class="card mb-4">
        <h6 class="card-header">@lang("sistema.MeusCertificados")</h6>
        <div class="card-body">
            @include('flash::message')
            <div class="table-responsive">
                @include('certificates.company.table')
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">
                {{ $companyCertificates->links() }}
            </div>
        </div>
    </div>
@endsection