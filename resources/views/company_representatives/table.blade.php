<table class="table card-table" id="companyPartners-table">
    <thead>
        <tr>
        <th>Empresa</th>
        <th>Nome</th>
            <th >
                <div class="pull-right">Ação</div>

            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyRepresentatives as $representative)
        <tr>
            <td>{!! $representative->company->name !!}</td>
            <td>{!! $representative->name !!}</td>
            <td>
                {!! Form::open(['route' => ['companyRepresentatives.destroy', $representative->id], 'method' =>
                'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('companyRepresentatives.show')
                    <a href="{!! route('companyRepresentatives.show', [$representative->id]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('companyRepresentatives.edit')
                    <a href="{!! route('companyRepresentatives.edit', [$representative->id]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('companyRepresentatives.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>