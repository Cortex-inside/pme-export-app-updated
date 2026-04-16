@extends('layouts.admin.index')
@section('header')
    <div class="d-flex">
    <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
    @can('products.create')
        <div class="">
        <a class="btn btn-primary  "  href="{!! route('products.create') !!}"><span class="ion ion-md-add"></span>&nbsp; Cadastrar </a>
        </div>
    @endcan
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("products.index")}}">Produtos</a></li>
            <li class="breadcrumb-item active">Listar</li>

        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Produtos</h6>
        <div class="card-body">
            @include('flash::message')
            <div class="table-responsive">
                @include('products.table')

            </div>
        </div>
        <div class="card-footer">
            {{ $products->links() }}
        </div>
    </div>
@endsection

