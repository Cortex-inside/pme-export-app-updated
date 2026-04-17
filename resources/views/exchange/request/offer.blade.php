@extends('layouts.admin.index')
@section('css')
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">--}}
    <link rel="stylesheet" href="/assets/css/pages/projects.css">

@endsection
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("exchange.index")}}">Compra e Venda</a></li>
            <li class="breadcrumb-item active">Detalhes</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Header -->
    <div class="card mb-4">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-9">
                <div class="media-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div>
                            <strong class="text-primary text-large">Empresa: {!! $announcement->company->name
                            !!}</strong>
                        </div>
                        <div class="text-muted small"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class=" px-3 py-4">
                    <div class="text-muted small">Produto</div>
                    <strong class="text-success text-big">{!! $announcement->product->name !!}</strong>
                </div>
            </div>
        </div>
    </div>


    {!! Form::open(['url' => route('exchange.request.offer-store', [$announcement->uuid]), 'id'=>'anuncioPost', 'enctype' => 'multipart/form-data']) !!}

    <div class="row">
        <div class="col">
            <!-- Detalhes -->
            <div class="card mb-4">
                <h6 class="card-header">Detalhes</h6>
                <div class="card-body">

                    <div class="ui-feed">
                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fas fa-dollar-sign bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong>Preço:</strong> {{coin($announcement->coin)}} {{$announcement->price}}<span
                                            class="text-muted
                                        float-right
                                        small">Preço</span></h6>
                                {!! Form::text('price', $announcement->price, ['class' => 'form-control currency',
                                'required']) !!}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fa fa-cubes bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong>Quantidade:</strong> {{$announcement->amount}}
                                    ({{$announcement->unidadeMedidaOuPeso()}}) <span class="text-muted float-right
                                            small">Quantidade</span></h6>
                                {!! Form::text('amount', $announcement->amount, ['class' => 'form-control','required']) !!}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fa  fa-map-marker bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong> Local de Entrega:</strong>  {{$announcement->local_entrega}} <span class="text-muted float-right small">Local de Entrega </span></h6>
                                {!! Form::text('local_entrega', $announcement->local_entrega, ['class' => 'form-control','required']) !!}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fa  fa-truck bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong>Logística:</strong>  {{$announcement->logistica}}<span class="text-muted float-right small">Logística</span></h6>
                                {!! Form::text('logistica', $announcement->logistica, ['class' => 'form-control','required']) !!}
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fas fa-calendar-alt bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong>Data Cadastro :</strong>  {{$announcement->getCreatedAtFormat()}}<span class="text-muted float-right small">Data Cadastro</span></h6>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-auto pr-0">
                                <i class="fa  fa-list bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong>Observações:</strong> <br>
                                    <div style="padding: 10px">
                                        {!! nl2br($announcement->description) !!}
                                    </div>
                                    <span class="text-muted float-right small">Observações</span></h6>
                                {!! Form::textarea('description', $announcement->description, ['class' => 'form-control','required','rows'=>'3']) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->company_id != $announcement->company_id)
            <div class="col-md-4 col-xl-3">
                <!-- Project details -->
                <div class="card mb-4">
                    <h6 class="card-header">Indicação {{$announcement->typeVendaCompra()}} - {{date("d/m/Y")}}</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-block btn-success btn-lg">Finalizar</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route("exchange.offer-detail",[$announcement->uuid])}}" class="btn
                            btn-default btn-lg btn-block">Voltar</a>
                        </li>
                    </ul>
                </div>
                <!-- / Project details -->
            </div>
        @endif

    </div>
    {!! Form::close() !!}


    <!-- / Header -->
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>

    <script>
      $('.currency').maskMoney({prefix:'$ ', allowNegative: false, thousands:',', decimal:'.', affixesStay: false});
    </script>

@endsection
