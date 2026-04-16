@extends('layouts.admin.index')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/libs/select2/select2.css">
@endsection
@section('header')
    {{--<h4 class="font-weight-bold py-3 mb-0">Layouts and elements</h4>--}}
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("products.index")}}">Produtos</a></li>
            <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Produto</h6>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! Form::open(['route' => 'products.store']) !!}
            @include('products.fields')
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
@endsection
