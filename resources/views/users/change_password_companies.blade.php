@extends('layouts.app')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
@endsection
@section('content')
    @include('messages')
    @include('error')
    <section class="content-header">
        <div class="page-header">
            <div class="page-header">
                <h3><i class="glyphicon glyphicon-edit"></i> Usuários / Mudar Senha #{{$user->id}}</h3>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <form action="{{ route('sysCompany.company.users.update_password', $user->uuid) }}" method="POST">
                    <div class="box-info padding-10">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <div>{{$user->name}}</div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nova senha</label>
                            <div><input type="password" class="form-control" name="password"
                                        value="{{old('password')}}" placeholder="Senha" required></div>
                        </div>
                        <div class="form-group">
                            <label for="name">Repitir a nova senha</label>
                            <div><input type="password" class="form-control" name="repassword"
                                        value="{{old('password')}}" placeholder="Repitir senha" required></div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

