<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th >
            <div class="pull-right">Ação</div>

        </th>
        </tr>
    </thead>
    <tbody>
    @foreach($certificateCategories as $certificateCategory)
        <tr>
            <td>{!! $certificateCategory->name !!}</td>
            <td>{!! $certificateCategory->description !!}</td>
            <td>
                {!! Form::open(['route' => ['certificateCategories.destroy', $certificateCategory->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('certificateCategories.show')
                    <a href="{!! route('certificateCategories.show', [$certificateCategory->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('certificateCategories.edit')
                    <a href="{!! route('certificateCategories.edit', [$certificateCategory->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('certificateCategories.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>