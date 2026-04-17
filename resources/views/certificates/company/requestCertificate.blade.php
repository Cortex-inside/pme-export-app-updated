@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("sysCompany.certificates.requestCertificate", $certificate->uuid)
            }}">Solicitar certificado
                </a></li>
        </ol>
    </div>
@endsection
@section('content')

    <div class="card mb-4">
        <h6 class="card-header">Solicitar certificado</h6>
        <div class="card-body">

            <h4 class="font-weight-bold py-3 mb-0">Os seguintes documentos são necessários:</h4>

            @include('adminlte-templates::common.errors')
            @include('flash::message')

            {!! Form::open(['route' => 'sysCompany.certificates.storeRequestCertificate', 'files' => true]) !!}

            <input type="hidden" name="certificate_id" value="{{$certificate->id}}">
            @foreach($certificate->certificateRequirements as $requirement)
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label(str_slug($requirement->requirement->name,'_'), $requirement->requirement->name, ['class'=>'form-label']) !!}
                    @if($requirement->requirement->type == 1)
                        {!! Form::file($requirement->requirement->id, ['class' => 'form-control ', 'required'])
                         !!}
                    @else
                        {!! Form::textarea($requirement->requirement->id, null, ['class' => 'form-control', 'required']) !!}
                    @endif
                    <span><strong>Descrição da exigencia: </strong>{{$requirement->requirement->description}}</span>
                </div>
            @endforeach

            <div class="form-row">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Solicitar certificado', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
                    <a href="{!! route('sysCompany.certificates.index') !!}" class="btn btn-default">Cancelar</a>
                </div>
            </div>


            {!! Form::close() !!}

        </div>
    </div>
@endsection
