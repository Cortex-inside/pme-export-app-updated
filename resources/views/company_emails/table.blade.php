<table class="table table-responsive" id="companyEmails-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Company Id</th>
        <th>Email</th>
        <th>Type</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyEmails as $companyEmail)
        <tr>
            <td>{!! $companyEmail->uuid !!}</td>
            <td>{!! $companyEmail->company_id !!}</td>
            <td>{!! $companyEmail->email !!}</td>
            <td>{!! $companyEmail->type !!}</td>
            <td>
                {!! Form::open(['route' => ['companyEmails.destroy', $companyEmail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companyEmails.show', [$companyEmail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('companyEmails.edit', [$companyEmail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>