<table class="table table-responsive" id="documents-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Company Certificate Id</th>
        <th>Requirement Id</th>
        <th>User Id</th>
        <th>Status</th>
        <th>Url</th>
        <th>Approved Date</th>
        <th>Disapproved Date</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->uuid !!}</td>
            <td>{!! $document->company_certificate_id !!}</td>
            <td>{!! $document->requirement_id !!}</td>
            <td>{!! $document->user_id !!}</td>
            <td>{!! $document->status !!}</td>
            <td>{!! $document->url !!}</td>
            <td>{!! $document->approved_date !!}</td>
            <td>{!! $document->disapproved_date !!}</td>
            <td>
                {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documents.show', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documents.edit', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>