@extends('layouts.admin.index')
@section('header')
    {{--<h4 class="font-weight-bold py-3 mb-0">Layouts and elements</h4>--}}
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("sysCompany.company.users.change_password",$user->uuid)}}">Trocar Senha</a></li>
        </ol>
    </div>
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
@endsection
@section('content')

    @include('flash::message')
    @include('adminlte-templates::common.errors')

        <div class="card mb-4">
            <h6 class="card-header">Trocar Senha</h6>
            <div class="card-body">

                {!! Form::model($user, ['route' => ['sysCompany.company.users.update_password',
                $user->uuid], 'method' => 'POST']) !!}

                    <div class="box-info padding-10">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
                            <div>{{$user->name}}</div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Nova senha</label>
                            <div><input type="password" class="form-control" name="password"
                                        value="{{old('password')}}" placeholder="Senha" required></div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Repitir a nova senha</label>
                            <div><input type="password" class="form-control" name="repassword"
                                        value="{{old('password')}}" placeholder="Repitir senha" required></div>
                        </div>
                    </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
                        <a href="{!! route('exchange.index') !!}" class="btn btn-default">Cancelar</a>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
@endsection

