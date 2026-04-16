<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        {{--<th>Cae Id</th>--}}
        <th>Codigo</th>
        <th>Descrição</th>
        <th>Designação</th>
        {{--<th>Rev</th>--}}
        {{--<th>Other</th>--}}
            <th class="text-right">Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($caes as $cae)
        <tr>
            {{--<td>{!! $cae->cae_id !!}</td>--}}
            <td>{!! $cae->code !!}</td>
            <td>{!! $cae->description !!}</td>
            <td>{!! substr($cae->designation, 0, 40) !!}</td>
            {{--<td>{!! $cae->rev !!}</td>--}}
            {{--<td>{!! $cae->other !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['caes.destroy', $cae->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('caes.show')
                    <a href="{!! route('caes.show', [$cae->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('caes.edit')
                    <a href="{!! route('caes.edit', [$cae->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('caes.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>