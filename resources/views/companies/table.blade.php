<table class="table card-table" id="certificateCategories-table">
    <thead>
    <tr>
        <th>@lang("sistema.Nome")</th>
        <th>@lang("sistema.Status")</th>
        <th>@lang("sistema.SituacaoLegal")</th>
        {{--<th>@lang("sistema.Distrito")</th>--}}
        <th>Tipo</th>
        <th >
            <div class="pull-right">Ação</div>

        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{!! $company->id !!}</td>
            <td>{!! $company->name !!}</td>
            <td>{!! $company->status() !!}</td>
            <td>{!! ($company->legalSituation) ? $company->legalSituation->name : "" !!}</td>
{{--            <td>{!! ($company->district) ? $company->district->name : "" !!}</td>--}}
            <td>{!! ($company->type) ? $company->typeName() : "" !!}</td>
            <td>
                {!! Form::open(['route' => ['companies.destroy', $company->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('companies.show')
                    <a href="{!! route('companies.show', [$company->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('companies.edit')
                    <a href="{!! route('companies.edit', [$company->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('companies.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                    @hasanyrole('empresa|empresa_estrangeira')
                    <a href="{!! route('sysCompany.company.index', [$company->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i>Show</a>&nbsp;
                    @endhasanyrole
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>