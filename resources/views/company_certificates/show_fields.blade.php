<h4 class="font-weight-bold py-3 mb-0">Dados do Certificado</h4>

<div class="form-row">
<!-- Company Id Field -->
    <div class="form-group col-md-6">
        {!! Form::label('company_id', 'Empresa:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->company->name !!}</p>
    </div>

    <!-- Certificate Id Field -->
    <div class="form-group col-md-6">
        {!! Form::label('certificate_id', 'Certificado:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->certificate->name !!}</p>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->status() !!}</p>
        @if($companyCertificate->status == 3)
            <a href="{{route('sysCompany.certificates.showMyCertificates-imprimir',$companyCertificate->uuid)}}" target="_blank" class="btn btn-success btn-sm" >Imprimir</a>
        @endif
    </div>

    <!-- Request Date Field -->
    <div class="form-group col-md-6">
        {!! Form::label('request_date', 'Data do requerimento:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->request_dateFormat() !!}</p>
    </div>
</div>

<h4 class="font-weight-bold py-3 mb-0">Exigências</h4>
<div class="form-row">
    @foreach($companyCertificate->documents as $document)
        <!-- Request Date Field -->
        <div class="form-group  col-md-3">
            {!! Form::label(str_slug($document->requirement->name,'_'), $document->requirement->name.':') !!}
            @if($document->type == 1)
                <p><a class="btn btn-primary" href="{{$document->url}}" target="_blank"><i class="fa fa-file"></i> Visualizar documento</a></p>
            @else
                <p>{{$document->text}}</p>
            @endif
        </div>

    @endforeach
</div>


