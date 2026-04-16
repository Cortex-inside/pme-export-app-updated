@extends('layouts.app')

@section('content')
    @include('messages')
    @include('error')

    <section class="content-header">
        <h3><i class="glyphicon glyphicon-plus"></i> Permissions / Criar </h3>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'permissions.store']) !!}

                    <div class="box-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <div><input type="text" class="form-control" id="name" name="name" placeholder="name"></div>
                        </div>
                        <div class="form-group">
                            <label for="readable_name">Descricao</label>
                            <div><input type="text" class="form-control" id="readable_name" name="readable_name" placeholder="descricao"></div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Criar</button>
                        <a class="btn btn-link pull-right" href="{{ route('permissions.index') }}"><i class="glyphicon glyphicon-backward"></i> Voltar</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
