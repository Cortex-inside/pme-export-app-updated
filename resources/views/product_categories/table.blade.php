<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Name</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productCategories as $productCategory)
        <tr>
            <td>{!! $productCategory->name !!}</td>

            <td>
                {!! Form::open(['route' => ['productCategories.destroy', $productCategory->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('productCategories.show')
                        <a href="{!! route('productCategories.show', [$productCategory->uuid]) !!}" class='btn
                        btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('productCategories.edit')
                        <a href="{!! route('productCategories.edit', [$productCategory->uuid]) !!}" class='btn
                        btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('productCategories.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                    @hasanyrole('empresa|empresa_estrangeira')
                        <a href="{!! route('productCategories.company.index', [$productCategory->uuid]) !!}" class='btn
                        btn-secondary btn-sm'><i class="far fa-eye"></i>Visualizar</a>&nbsp;
                    @endhasanyrole
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>