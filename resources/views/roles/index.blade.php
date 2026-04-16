@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("roles.index")}}">Grupos</a></li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>
@endsection

@section('content')
    @include('messages')
    @include('error')
    <div class="card mb-4">
        <h6 class="card-header">Grupos</h6>
        <div class="card-body">

            <div class="table-responsive">
                @if($roles->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Criado</th>
                            <th>Modificado</th>
                            <th class="text-right">OPÇÕES</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td><a class="list-link" href="{{ route('roles.show', $role->id) }}">{{$role->name}}</a></td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($role->created_at)) }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($role->updated_at)) }}</td>

                                <td class="text-right">
                                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                                    <div class='btn-group pull-right'>
                                        @can('roles.show')
                                        <a href="{!! route('roles.show', [$role->id]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Show</a>&nbsp;
                                        @endcan
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Vazio!</h3>
                @endif
            </div>
        </div>
    </div>
@endsection