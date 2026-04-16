@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="page-header clearfix">
            <h2>
                Permissões
                <a class="btn btn-success pull-right" href="{{ route('permissions.create') }}"><i class="glyphicon glyphicon-plus"></i> Novo</a>
            </h2>
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('messages')
        @include('error')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @if($permissions->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>

                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Criado</th>
                            <th>Modificado</th>

                            <th class="text-right">OPÇÕES</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->readable_name}}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($permission->created_at)) }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($permission->updated_at)) }}</td>

                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('permissions.show', $permission->id) }}"><i class="glyphicon glyphicon-eye-open"></i> Exibir</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('permissions.edit', $permission->id) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deseja realmente excluir esse item?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $permissions->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Vazio!</h3>
                @endif
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
