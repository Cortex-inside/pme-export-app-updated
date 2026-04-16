<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
            <th>@lang("sistema.Nome")</th>

            <th>@lang("sistema.Categoria")</th>
        <th>@lang("sistema.Descricao")</th>
            <th class="text-right">@lang("sistema.Acoes")</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->productCategory->name !!}</td>
            <td>{!! $product->description !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('products.show')
                    <a href="{!! route('products.show', [$product->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('products.edit')
                    <a href="{!! route('products.edit', [$product->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('products.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                    @hasanyrole('empresa|empresa_estrangeira')
                    <a href="{!! route('products.company.index', [$product->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i>Show</a>&nbsp;
                    @endhasanyrole
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>