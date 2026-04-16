@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("sysCompany.certificates.showMyCertificates",
            $companyCertificate->id)
            }}">Meu Certificado</a></li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">{{$companyCertificate->certificate->name}}</h6>
        <div class="card-body">
            @include('certificates.company.show_fields')
        </div>
    </div>

    <div class="card mb-4">
        <h6 class="card-header">Chat</h6>
        <div class="card-body">
            @include('certificates.company.chat')
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('sysCompany.certificates.index') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>

@endsection
