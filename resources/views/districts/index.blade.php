@extends('layouts.admin.index')
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        @can('districts.create')
        <div class="">
            <a class="btn btn-primary  "  href="{!! route('districts.create') !!}"><span class="ion ion-md-add"></span>&nbsp; Cadastrar </a>
        </div>
        @endcan
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("districts.index")}}">Distritos</a></li>
            <li class="breadcrumb-item active">Listar</li>

        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Distritos</h6>
        <div class="card-body">
            @include('flash::message')
            <div class="table-responsive">
                @include('districts.table')

            </div>
        </div>
        <div class="card-footer">
            {{ $districts->links() }}
        </div>
    </div>
@endsection

