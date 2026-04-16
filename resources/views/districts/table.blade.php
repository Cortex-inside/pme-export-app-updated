<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Província</th>
            <th class="text-right">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($districts as $district)
        <tr>
            <td>{!! $district->name !!}</td>
            <td>{!! optional($district)->province->name !!}</td>
            <td>
                {!! Form::open(['route' => ['districts.destroy', $district->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('districts.show')
                    <a href="{!! route('districts.show', [$district->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('districts.edit')
                    <a href="{!! route('districts.edit', [$district->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('districts.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>