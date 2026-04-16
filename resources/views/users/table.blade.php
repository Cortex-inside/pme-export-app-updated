<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>BI</th>
            <th>Status</th>
            <th class="text-right">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! ($user->status != 1)? "<strike>" : "" !!}{{$user->name}}{!! ($user->status != 1)? "<strike>" : "" !!}</td>
            <td>{{$user->email}}</td>
            <td>
               {{$user->tipoUser()}}
            </td>
            <td>{{$user->cpf}}</td>
            <td>{{($user->status == 1)? "Habilitado" : "Desabilitado"}}</td>

            <td>
                {!! Form::open(['route' => ['users.destroy', $user->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('users.show')
                    <a href="{!! route('users.show', [$user->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('users.edit')
                    <a href="{!! route('users.edit', [$user->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('users.destroy')
                        @if(!Route::is("users.indexEmpresa"))
                            @if($user->id != Auth::user()->id)
                            {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                            @endif
                        @endif
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>