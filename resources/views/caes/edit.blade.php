@extends('layouts.admin.index')
@section('header')
    {{--<h4 class="font-weight-bold py-3 mb-0">Layouts and elements</h4>--}}
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("caes.index")}}">Caes</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Cae</h6>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! Form::model($cae, ['route' => ['caes.update',
            $cae->uuid], 'method' => 'patch']) !!}
            <input type="hidden" name="_method" value="PUT">

            @include('caes.fields')
            {!! Form::close() !!}
        </div>
    </div>
@endsection