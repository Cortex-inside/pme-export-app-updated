@extends('layouts.admin.index')

@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("certificates.index")}}">Certificados</a></li>
            <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Certificado</h6>
        {!! Form::model($certificate,['route' => 'certificates.store']) !!}
            <div class="card-body">
                @include('adminlte-templates::common.errors')
                @include('certificates.fields')
            </div>
            <div class="card-footer">
                <div class="form-row">
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
                        <a href="{!! route('certificates.index') !!}" class="btn btn-default  pull-right">Cancelar</a>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
@endsection
