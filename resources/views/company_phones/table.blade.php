<table class="table table-responsive" id="companyPhones-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Company Id</th>
        <th>Type</th>
        <th>Ddi</th>
        <th>Prefix</th>
        <th>Number</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyPhones as $companyPhone)
        <tr>
            <td>{!! $companyPhone->uuid !!}</td>
            <td>{!! $companyPhone->company_id !!}</td>
            <td>{!! $companyPhone->type !!}</td>
            <td>{!! $companyPhone->ddi !!}</td>
            <td>{!! $companyPhone->prefix !!}</td>
            <td>{!! $companyPhone->number !!}</td>
            <td>
                {!! Form::open(['route' => ['companyPhones.destroy', $companyPhone->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companyPhones.show', [$companyPhone->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('companyPhones.edit', [$companyPhone->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>