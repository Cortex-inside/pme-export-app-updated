@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("roles.index")}}">Grupo</a></li>
        </ol>
    </div>
@endsection

@section('content')
    @include('flash::message')


    <div class="card mb-4">
        <h6 class="card-header">Permissões do Grupo {{$role->name}}</h6>
        <div class="card-body">
            <div class="form-group">
                <form action="{{ route('roles.permission.update',$role->id) }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="well col-md-12">
                        <div class="table-responsive">
                            <table class="table table-condensed table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Tem acesso?</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->readable_name}}</td>
                                    <td>
                                        <input type="radio" value="1" name="{{$permission->id}}" {{(roleHasPermission($role->id,$permission->id) == 1)? "checked": ""}} required> Sim
                                        <input type="radio" value="0" name="{{$permission->id}}" {{(roleHasPermission($role->id,$permission->id) == 2)? "checked": ""}} required> Não
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('roles.index') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>

@endsection