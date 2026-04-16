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
    @foreach($companyPartners as $companyPartner)
        <tr>
            <td>{!! $companyPartner->company->name !!}</td>
            <td>{!! $companyPartner->name !!}</td>
            <td>
                {!! Form::open(['route' => ['companyPartners.destroy', $companyPartner->id], 'method' =>
                'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('companyPartners.show')
                    <a href="{!! route('companyPartners.show', [$companyPartner->id]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('companyPartners.edit')
                    <a href="{!! route('companyPartners.edit', [$companyPartner->id]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('companyPartners.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>