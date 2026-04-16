<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Pedido</th>
        <th>Empresa Solicitante</th>
        <th>Status</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Data Pedido</th>
        <th>Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($requests as $request)
        <tr>
            <td>{!! $request->numeroPedido() !!}</td>
            <td>{!! $request->company_request->name !!}</td>
            <td>
                {!! $request->status() !!}
                @if($request->status == 2)
                    <span class="badge badge-warning text-white" data-toggle='tooltip' title="@if($request->canceled_message){{$request->canceled_message}}
                    @else {{"Pedido cancelado"}} @endif">{{$request->cancelDateFormat()}}</span>
                @endif
            </td>
            <td>{!! $request->company_announcements->product->name !!}</td>
            <td>{!! $request->amount !!} {!! $request->unidadeMedidaOuPeso() !!}</td>
            <td>{!! $request->dataPedido() !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('exchange.request.detail', [$request->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>