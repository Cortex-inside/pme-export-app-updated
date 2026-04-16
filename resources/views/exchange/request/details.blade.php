@extends('layouts.admin.index')

@section('css')
    {{--<link rel="stylesheet" href="/assets/css/bootstrap-material.css">--}}
    {{--<link rel="stylesheet" href="/assets/css/shreerang-material.css">--}}
    {{--<link rel="stylesheet" href="/assets/css/uikit.css">--}}
    {{--<link rel="stylesheet" href="/assets/libs/bootstrap-sweetalert/bootstrap-sweetalert.css">--}}
    <!-- Libs -->
    <link rel="stylesheet" href="/assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="/assets/css/pages/chat.css">
@endsection
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        <div>
            <a class="btn btn-info pull-right" href="{{route("exchange.requests")}}"> @lang('sistema.Back')</a>
            @hasanyrole('empresa|empresa_estrangeira')
                @if($announcement->company_announcements->company->id == Auth::user()->company->id)
                    @if($announcement->status == 1)
                    <a class="btn btn-warning pull-right text-white" style="margin-right: 10px; margin-left: 10px"
                       data-toggle="modal"
                       data-target="#myModalCancel">
                        <i class="fas fa-window-close"></i>  @lang('sistema.Cancel') </a>

                    <a class="btn btn-success pull-right text-white"  onclick="event.preventDefault();
                                                     document.getElementById('aprovar-form').submit();" ><i class="fas fa-window-close"></i>  @lang('sistema.Aprovar') </a>
                    @endif
                @endif
            @endhasanyrole
        </div>
    </div>
    <form action="{{route("exchange.request.closed",$announcement->uuid)}}" method="POST" id="aprovar-form" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{--{!! Form::button('<i class="fas fa-check-circle"></i> Aprovar ', ['type' => 'submit', 'class' => 'btn btn-success ', 'onclick' => "return confirm('Tem certeza que voce quer aprovar este pedido?')"]) !!} &nbsp;--}}
    </form>

    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("exchange.request.detail",$announcement->uuid)}}">Pedido
                    solicitado
                </a></li>
            <li class="breadcrumb-item active">Detalhes</li>
        </ol>
    </div>
@endsection

@section('content')
    @include('messages')
    @include('flash::message')
    @hasanyrole('empresa_estrangeira|empresa')
        @if($announcement->company_announcements->company->id == Auth::user()->company->id)
            <div class="card mb-4">
                <h6 class="card-header">Empresa solicitante: {{$announcement->company_request->name}}
                    @if($announcement->status == 2)
                        <span class="badge badge-warning text-white">Cancelado</span>
                    @endif
                    <span class="pull-right">Status: {{$announcement->status()}} - Data Solicitação:
                        {{$announcement->dataPedido()}}</span>
                </h6>
                <div class="card-body">
                        @include('exchange.request.details-company-fields-solicitante')
                </div>

            </div>
        @else
            <div class="card mb-4">
                <h6 class="card-header">Pedido solicitado para empresa: {{$announcement->company_announcements->company->name}}
                    @if($announcement->status == 2)
                        <span class="badge badge-warning text-white">Cancelado</span>
                    @endif
                    <span class="pull-right">Status: {{$announcement->status()}} - Data Solicitação: {{$announcement->dataPedido()}}</span>
                </h6>
                    <div class="card-body">
                        @include('exchange.request.details-company-fields')
                    </div>

            </div>
        @endif

        <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h6 class="card-header">Produto Oferta</h6>
                        <div class="card-body">
                            @include('exchange.request.details-product-fields-oferta')
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <h6 class="card-header">Produto Anunciado</h6>
                        <div class="card-body">
                            @include('exchange.request.details-product-fields-anuncio')
                        </div>
                    </div>
                </div>
            </div>
    @else
        <div class="card mb-4">
            <h6 class="card-header">Pedido solicitado para empresa: {{$announcement->company_announcements->company->name}}
                @if($announcement->status == 2)
                    <span class="badge badge-warning text-white">Cancelado</span>
                @endif
                <span class="pull-right">Data Solicitação: {{$announcement->dataPedido()}}</span>

            </h6>
            <div class="card-body">
                @include('exchange.request.details-company-fields')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <h6 class="card-header">Produto Oferta</h6>
                    <div class="card-body">
                        @include('exchange.request.details-product-fields-oferta')
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <h6 class="card-header">Produto Anunciado</h6>
                    <div class="card-body">
                        @include('exchange.request.details-product-fields-anuncio')
                    </div>
                </div>
            </div>
        </div>
    @endhasanyrole
    @if($announcement->status != 2)
        <div class="card mb-4">
            <h6 class="card-header">Entrar em contato com a empresa (Chat)</h6>
            <div class="card-body">
                @include('exchange.request.chat-request')
            </div>
        </div>
    @endif
    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('exchange.requests') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> @lang('sistema.Back')</a>
            </div>
        </div>
    </div>
<div class="modal fade" id="myModalCancel" tabindex="-1" role="dialog" aria-labelledby="myModalCancel">
    <div class="modal-dialog ">
        <form action="{{route("exchange.request.cancelation",$announcement->uuid)}}" method="POST" class="modal-content">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-header">
                <h5 class="modal-title">Cancelamento
                    <span class="font-weight-light">Pedido</span>
                    <br>
                    <small class="text-muted">Por favor informe o motivo do seu cancelamento.</small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">@lang('sistema.CancelMessage')</label>
                        <textarea name="cancel_message" class="form-control" required="required" id="cancel_message"></textarea>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script src="/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/js/pages/pages_chat.js"></script>

    {{--<script src="/js/jquery.mask.min.js"></script>--}}
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>
    {{--<script src="/assets/js/pages/ui_modals.js"></script>--}}

    <script>
        $(document).ready(function() {
            $('.currency').maskMoney({prefix:'$ ', allowNegative: true, thousands:'', decimal:'.', affixesStay: false});

            $("#reuse_config").change(function () {
                if(this.value == 1) {
                    $("#reuse_days").prop("disabled", false);
                }else{
                    $("#reuse_days").prop("disabled", true);
                }
            })
        });

    </script>
@endsection