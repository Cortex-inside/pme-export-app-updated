<table class="table table-responsive" id="certificateRequirements-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Certificate Id</th>
        <th>Requirement Id</th>
            <th >
                <div class="pull-right">Ação</div>

            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($certificateRequirements as $certificateRequirement)
        <tr>
            <td>{!! $certificateRequirement->uuid !!}</td>
            <td>{!! $certificateRequirement->certificate_id !!}</td>
            <td>{!! $certificateRequirement->requirement_id !!}</td>
            <td>
                {!! Form::open(['route' => ['certificateRequirements.destroy', $certificateRequirement->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('certificateRequirements.show', [$certificateRequirement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('certificateRequirements.edit', [$certificateRequirement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>