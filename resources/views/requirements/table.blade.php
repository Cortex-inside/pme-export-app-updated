    <table class="table  card-table " id="requirements-table">
        <thead>
            <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Tipo</th>
                <th colspan="3" class="">
                    <div class='pull-right'>
                        Ação
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($requirements as $requirement)
            <tr>
                <td>{!! $requirement->name !!}</td>
                <td>{!! $requirement->description !!}</td>
                <td>{!! $requirement->type() !!}</td>
                <td>
                    {!! Form::open(['route' => ['requirements.destroy', $requirement->id], 'method' => 'delete']) !!}
                    <div class='btn-group pull-right'>
                        @can('requirements.show')
                        <a href="{!! route('requirements.show', [$requirement->id]) !!}" class='btn
                        btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                        @endcan
                        @can('requirements.edit')
                        <a href="{!! route('requirements.edit', [$requirement->id]) !!}" class='btn
                        btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                        @endcan
                        @can('requirements.destroy')
                        {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
