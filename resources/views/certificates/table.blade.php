<table class="table card-table " id="certificates-table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Departamento</th>
            <th>Categoria</th>
            <th>Status</th>
            <th colspan="3">
                <div class="pull-right">
                Ação
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($certificates as $certificate)
        <tr>
            <td>{!! $certificate->name !!}</td>
            <td>{!! $certificate->department->name !!}</td>
            <td>{!! optional($certificate->certificateCategory)->name !!}</td>
            <td>{!! $certificate->status() !!}</td>
            <td>
                {!! Form::open(['route' => ['certificates.destroy', $certificate->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('certificates.show')
                    <a href="{!! route('certificates.show', [$certificate->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                    @can('certificates.edit')
                    <a href="{!! route('certificates.edit', [$certificate->uuid]) !!}" class='btn
                    btn-info btn-sm'><i class="far fa-edit"></i> Editar</a>&nbsp;
                    @endcan
                    @can('certificates.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>