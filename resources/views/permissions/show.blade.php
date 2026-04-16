@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="page-header">
            <h3>Permissions / Exibir #{{$permission->id}}</h3>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deseja realmente excluir esse item?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <div class="btn-group pull-right" role="group" aria-label="...">
                    <a class="btn btn-warning btn-group" role="group" href="{{ route('permissions.edit', $permission->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    <button type="submit" class="btn btn-danger">Excluir <i class="glyphicon glyphicon-trash"></i></button>
                </div>
            </form>
        </div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <form action="#">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nome">ID</label>
                                <p class="form-control-static">{{$permission->id}}</p>
                            </div>
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <p class="form-control-static">{{$permission->name}}</p>
                            </div>
                            <div class="form-group">
                                <label for="readable_name">Descrição</label>
                                <p class="form-control-static">{{$permission->readable_name}}</p>
                            </div>

                        </div>
                    </form>

                    <a class="btn btn-link" href="{{ route('permissions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection