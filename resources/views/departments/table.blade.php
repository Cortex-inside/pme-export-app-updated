<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Descrição</th>
            <th class="text-right">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
            <td>{!! $department->name !!}</td>
            <td>{!! $department->description !!}</td>
            <td>
                {!! Form::open(['route' => ['departments.destroy', $department->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('departments.show')
                    <a href="{!! route('departments.show', [$department->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('departments.edit')
                    <a href="{!! route('departments.edit', [$department->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('departments.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>