<table class="table table-responsive" id="requestProducts-table">
    <thead>
        <tr>
            <th>Request Id</th>
        <th>Product Id</th>
            <th colspan="3">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($requestProducts as $requestProduct)
        <tr>
            <td>{!! $requestProduct->request_id !!}</td>
            <td>{!! $requestProduct->product_id !!}</td>
            <td>
                {!! Form::open(['route' => ['requestProducts.destroy', $requestProduct->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('requestProducts.show', [$requestProduct->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('requestProducts.edit', [$requestProduct->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>