<table class="table table-responsive" id="companyCertificateMessages-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Company Certificate Id</th>
        <th>User Id</th>
        <th>Message</th>
        <th>Type</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyCertificateMessages as $companyCertificateMessage)
        <tr>
            <td>{!! $companyCertificateMessage->uuid !!}</td>
            <td>{!! $companyCertificateMessage->company_certificate_id !!}</td>
            <td>{!! $companyCertificateMessage->user_id !!}</td>
            <td>{!! $companyCertificateMessage->message !!}</td>
            <td>{!! $companyCertificateMessage->type !!}</td>
            <td>
                {!! Form::open(['route' => ['companyCertificateMessages.destroy', $companyCertificateMessage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companyCertificateMessages.show', [$companyCertificateMessage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('companyCertificateMessages.edit', [$companyCertificateMessage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>