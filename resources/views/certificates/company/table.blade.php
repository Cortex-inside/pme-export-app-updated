<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
            <th>@lang("sistema.Nome")</th>
            <th>@lang("sistema.Status")</th>
            <th colspan="3" class="pull-right">@lang("sistema.Acao")</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyCertificates as $companyCertificate)
        <tr>
            <td>{!! $companyCertificate->certificate->name !!}</td>
            <td>{!! $companyCertificate->status() !!}</td>
            <td>
                {!! Form::open(['route' => ['certificates.destroy', $companyCertificate->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    <a href="{!! route('sysCompany.certificates.showMyCertificates', [$companyCertificate->id]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i>@lang("sistema.Show")</a>&nbsp;

                    @hasrole('admin')
                        @if($companyCertificate->certificate->id <> 1)
                        {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                        @endif
                    @endhasrole
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>