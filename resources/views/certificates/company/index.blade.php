@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("certificates.index")}}">@lang("sistema.menu_empresa.Certificados")</a></li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>
@endsection

@section('content')


        @include('flash::message')
        @include('certificates.company.lista-certificados')
@endsection
