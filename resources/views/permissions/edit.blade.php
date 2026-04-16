@extends('layouts.app')

@section('content')
    @include('messages')
    @include('error')
    <section class="content-header">
        <div class="page-header">
            <h3><i class="glyphicon glyphicon-edit"></i> Permissions / Editar #{{$permission->id}}</h3>
        </div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'patch']) !!}

                    <div class="box-body">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <div><input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}" placeholder="name"></div>
                        </div>
                        <div class="form-group">
                            <label for="readable_name">Descrição</label>
                            <div><input type="text" class="form-control" id="readable_name" value="{{$permission->readable_name}}" name="readable_name" placeholder="Descrição"></div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-link pull-right" href="{{ route('permissions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Voltar</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
