<table class="table table-responsive" id="legalSituations-table">
    <thead>
        <tr>
            <th>Uuid</th>
        <th>Name</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($legalSituations as $legalSituation)
        <tr>
            <td>{!! $legalSituation->uuid !!}</td>
            <td>{!! $legalSituation->name !!}</td>
            <td>
                {!! Form::open(['route' => ['legalSituations.destroy', $legalSituation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('legalSituations.show', [$legalSituation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('legalSituations.edit', [$legalSituation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>