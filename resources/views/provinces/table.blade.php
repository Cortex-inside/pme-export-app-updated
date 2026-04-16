<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Nome</th>
            <th class="text-right">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($provinces as $province)
        <tr>
            <td>{!! $province->name !!}</td>
            <td>
                {!! Form::open(['route' => ['provinces.destroy', $province->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('provinces.show')
                    <a href="{!! route('provinces.show', [$province->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('provinces.edit')
                    <a href="{!! route('provinces.edit', [$province->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('provinces.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>