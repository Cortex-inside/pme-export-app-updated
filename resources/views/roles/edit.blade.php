@extends('layouts.admin.index')
@section('header')
    {{--<h4 class="font-weight-bold py-3 mb-0">Layouts and elements</h4>--}}
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("roles.index")}}">Grupos</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Grupo</h6>
        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            @include('roles.fields')
        </div>
        <div class="card-footer">
            <div class="form-row">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
                    <a href="{!! route('roles.index') !!}" class="btn btn-default  pull-right">Cancelar</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
@endsection