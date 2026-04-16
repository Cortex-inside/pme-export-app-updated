<table class="table card-table " id="certificates-table">
    <thead>
        <tr>
            <th>Nome do produto</th>
            <th>Categoria</th>
            <th>Visibilidade</th>
            <th>Tipo de exposição</th>
            <th>Preço</th>
            <th >
                <div class="pull-right">Ação</div>
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($announcements as $announcement)
        <tr>
            <td>{!! $announcement->product->name !!}</td>
            <td>{!! $announcement->product->productCategory->name !!}</td>
            <td>{!! $announcement->visibility() !!}</td>
            <td>{!! $announcement->typeOfExposure() !!}</td>
            <td>{!! $announcement->price !!}</td>
            <td>
                {!! Form::open(['route' => ['sysCompany.companyAnnouncements.destroy', $announcement->uuid], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    @can('sysCompany.companyAnnouncements.show')
                    <a href="{!! route('sysCompany.companyAnnouncements.show', [$announcement->uuid]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan

                    @can('sysCompany.companyAnnouncements.destroy')
                    {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                    @endcan

                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>