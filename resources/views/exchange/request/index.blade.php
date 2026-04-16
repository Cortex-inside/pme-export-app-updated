@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("exchange.requests")}}">Pedidos
                </a></li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Pedidos</h6>
        <div class="card-body">
            @include('flash::message')

            <div class="table-responsive">
                @include('exchange.request.table')
            </div>
        </div>

        <div class="card-footer">
            {{ $requests->links() }}
        </div>
    </div>
@endsection
