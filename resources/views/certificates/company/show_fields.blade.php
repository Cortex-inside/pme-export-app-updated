<div class="form-row">

    <div class="form-group  col-md-6">
        {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->certificate->name !!}</p>
    </div>


    <!-- Duration Field -->
    <div class="form-group  col-md-6">
        {!! Form::label('duration', 'Duração:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->certificate->duration !!}</p>
    </div>
</div>

<!-- Certificate Category Id Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    <p>{!! $companyCertificate->certificate->description !!}</p>
</div>


<div class="form-row">
<!-- Status Field -->
    <div class="form-group col-md-6">
        {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->status() !!}</p>
        @if($companyCertificate->status == 3)
            <a href="{{route('sysCompany.certificates.showMyCertificates-imprimir',$companyCertificate->uuid)}}" target="_blank" class="btn btn-success btn-sm" >Imprimir</a>
        @endif
    </div>

    <!-- Created At Field -->
    <div class="form-group col-md-6">
        {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
        <p>{!! $companyCertificate->request_dateFormat() !!}</p>
    </div>
</div>

