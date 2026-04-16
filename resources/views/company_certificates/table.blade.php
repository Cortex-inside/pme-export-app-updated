<table class="table card-table" id="certificateCategories-table">
    <thead>
        <tr>
        <th>Empresa</th>
        <th>Certificado</th>
        <th>Status</th>
        <th>Data do requerimento</th>
            <th >
                <div class="pull-right">Ação</div>

            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyCertificates as $companyCertificate)
        <tr>
            <td>{!! $companyCertificate->company->name !!}</td>
            <td>{!! $companyCertificate->certificate->name !!}</td>
            <td>{!! $companyCertificate->status() !!}</td>
            <td>{!! $companyCertificate->request_dateFormat() !!}</td>
            <td>
                <div class='btn-group'>
                    @can('certificateCategories.show')
                    <a href="{!! route('companyCertificates.show', [$companyCertificate->id]) !!}" class='btn
                    btn-secondary btn-sm'><i class="far fa-eye"></i> Visualizar</a>&nbsp;
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>