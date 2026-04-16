<table class="table table-responsive" id="requestMessages-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Request Id</th>
        <th>User Id</th>
        <th>Message</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($requestMessages as $requestMessage)
        <tr>
            <td>{!! $requestMessage->uuid !!}</td>
            <td>{!! $requestMessage->request_id !!}</td>
            <td>{!! $requestMessage->user_id !!}</td>
            <td>{!! $requestMessage->message !!}</td>
            <td>
                {!! Form::open(['route' => ['requestMessages.destroy', $requestMessage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('requestMessages.show', [$requestMessage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('requestMessages.edit', [$requestMessage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>