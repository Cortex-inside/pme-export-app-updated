<table class="table table-responsive" id="companyCaes-table">
    <thead>
        <tr>
            <th>Company Id</th>
        <th>Cae Id</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyCaes as $companyCae)
        <tr>
            <td>{!! $companyCae->company_id !!}</td>
            <td>{!! $companyCae->cae_id !!}</td>
            <td>
                {!! Form::open(['route' => ['companyCaes.destroy', $companyCae->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companyCaes.show', [$companyCae->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('companyCaes.edit', [$companyCae->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>