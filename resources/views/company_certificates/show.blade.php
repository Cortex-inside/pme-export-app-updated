@extends('layouts.admin.index')
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        <div class="">
            @if($companyCertificate->status == 1)
                <a class="btn btn-primary btn-group" role="group" href="{{ route('companyCertificates.startAnalyze', $companyCertificate->id) }}"><i class="glyphicon glyphicon-edit"></i> Iniciar analise</a>
            @elseif($companyCertificate->status == 2)
                <a class="btn btn-success" role="group" href="{{ route('companyCertificates.approve', $companyCertificate->id) }}" onclick="if(confirm('Deseja realmente aprovar esse pedido?')) { return true } else {return false };"><i class="feather icon-thumbs-up"></i> Aprovar</a>

                <a class="btn btn-danger" style="color:white"  data-toggle="modal" data-target="#myModal" role="group"><i
                            class="feather
                 icon-thumbs-down"></i>  Reprovar</a>
            @else

            @endif
        </div>
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("certificateCategories.index")}}">Certificados Categoria</a></li>
        </ol>
    </div>
@endsection


@section('content')
    @include('flash::message')

    <div class="card mb-4">
        <h6 class="card-header">Certificado Categoria</h6>
        <div class="card-body">
            @include('company_certificates.show_fields')
        </div>
    </div>

    <div class="card mb-4">
        <h6 class="card-header">Chat</h6>
        <div class="card-body">
            @include('company_certificates.chat')
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('companyCertificates.index') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reprovar pedido de certificado</h4>
                </div>
                {!! Form::open(['route' => 'companyCertificates.disapprove']) !!}
                <div class="modal-body">
                    <input type="hidden" name="company_certificate_id" value="{{$companyCertificate->id}}">

                    <div class="form-group">
                        {!! Form::label('motive_disapprove', 'Motivo:') !!}
                        {!! Form::textarea('motive_disapprove', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Reprovar pedido', ['class' => 'btn btn-danger  waves-effect waves-light', 'onClick' => 'if(confirm
                    ("Deseja realmente reprovar esse pedido?")) { return true } else {return false };']) !!}

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

