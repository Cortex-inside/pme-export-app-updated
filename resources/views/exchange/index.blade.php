@extends('layouts.admin.index')
@section('css')
@endsection
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("exchange.index")}}">@lang("sistema.CompraeVenda")</a></li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="row">

        @if($announcements->count())
         @foreach($announcements as $announcement)
            @php
                $product = $announcement->product;
                $company = $announcement->company;
            @endphp
            @if(!$product || !$company)
                @continue
            @endif
            @if($announcement->visibility == 1 AND $announcement->checkVisible())
                    <div class="col-md-6">
                        <div class="card mb-4 overflow-hidden">
                            <div class="card-body">
                                {{--<div class="card-badges bg-danger text-white"><span>Urgent</span></div>--}}
                                @php($category = $product->productCategory)
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ optional($category)->photo_url ?? asset('img/blank.gif') }}" alt="{{ optional($category)->name ?? 'Categoria' }}" style="width:64px;height:64px;object-fit:cover;border-radius:8px;" class="mr-2"/>
                                    <div>
                                        <div class="text-dark text-large font-weight-semibold">Produto: {{$product->name}}</div>
                                        <small class="text-muted">Categoria: {{ optional($category)->name ?? 'Não informada' }}</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap mt-3">
                                    <div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-business text-primary" title="Empresa"></i> {!! $company->name !!}</div>
                                    <div class="mr-3"><i class="vacancy-tooltip mr-1 fas fa-project-diagram text-light"
                                                         title="Mercado"></i> Mercado: {{$announcement->marketType()}}</div>
                                    <div class="mr-3"><i class="vacancy-tooltip mr-1 fas fa-money-check text-light"
                                                         title="Pagamento"></i>Pagamento:
                                        {{$announcement->paymentModel()}}</div>
                                </div>
                                <div class="my-3" >
                                    {{--style="overflow-y: scroll; min-height: 105px; height: 105px"--}}

                                    <div class="card d-flex w-100 mb-4">
                                        <div class="row no-gutters row-bordered row-border-light h-100">
                                            <div class="d-flex col-sm-12 col-md-12 col-lg-12 align-items-center">
                                                <div class="card-body media align-items-center text-dark">
                                                    <i class="lnr lnr-cart display-4 text-primary"></i>
                                                    <span class="media-body d-block ml-3">
                                                        <span class="text-big mr-1 text-primary">
                                                            {!! coin($announcement->coin) !!} {{$announcement->price}}
                                                        </span>
                                                        <br>
                                                        <small class="text-muted">Quantidade: {{$announcement->amount}} |
                                                            Tipo: {{$announcement->unidadeMedidaOuPeso()}}
                                                        </small>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="card d-flex w-100 mb-4" >--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-12" style="overflow-y: auto; min-height: 105px;--}}
                                        {{--height:105px">--}}
                                            {{--<div class="card-body">--}}
                                                {{--<h5 class="font-weight-bold mb-0">Descrição:</h5>--}}
                                                {{--<div>{{$announcement->description}}</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="text-right">
                                    <a href="{{route("exchange.offer-detail",[$announcement->uuid])}}" class='btn btn-primary btn-round'>
                                        {{$announcement->typeOfExposure()}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

            @endif
            @if($announcement->visibility != 1)

                    <div class="col-md-6">
                        <div class="card mb-4 overflow-hidden">
                            <div class="card-body">
                                {{--<div class="card-badges bg-danger text-white"><span>Urgent</span></div>--}}
                                @php($category = $product->productCategory)
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ optional($category)->photo_url ?? asset('img/blank.gif') }}" alt="{{ optional($category)->name ?? 'Categoria' }}" style="width:64px;height:64px;object-fit:cover;border-radius:8px;" class="mr-2"/>
                                    <div>
                                        <div class="text-dark text-large font-weight-semibold">Produto: {{$product->name}}</div>
                                        <small class="text-muted">Categoria: {{ optional($category)->name ?? 'Não informada' }}</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap mt-3">
                                    <div class="mr-3"><i class="vacancy-tooltip mr-1 ion ion-md-business text-primary" title="Empresa"></i> {!! $company->name !!}</div>
                                    <div class="mr-3"><i class="vacancy-tooltip mr-1 fas fa-project-diagram text-light"
                                                         title="Mercado"></i> Mercado: {{$announcement->marketType()}}</div>
                                    <div class="mr-3"><i class="vacancy-tooltip mr-1 fas fa-money-check text-light"
                                                         title="Pagamento"></i>Pagamento:
                                        {{$announcement->paymentModel()}}</div>
                                </div>
                                <div class="my-3" >
                                    {{--style="overflow-y: scroll; min-height: 105px; height: 105px"--}}

                                    <div class="card d-flex w-100 mb-4" >
                                        <div class="row no-gutters row-bordered row-border-light h-100">
                                            <div class="d-flex col-sm-12 col-md-12 col-lg-12 align-items-center">
                                                <div class="card-body media align-items-center text-dark">
                                                    <i class="lnr lnr-cart display-4 text-primary"></i>
                                                    <span class="media-body d-block ml-3">
                                                            <span class="text-big mr-1 text-primary">
                                                                {!! coin($announcement->coin) !!} {{$announcement->price}}
                                                            </span>
                                                            <br>
                                                            <small class="text-muted">Quantidade: {{$announcement->amount}} |
                                                                Tipo: {{$announcement->unidadeMedidaOuPeso()}}
                                                                <br>
                                                            </small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right" >
                                    <a href="{{route("exchange.offer-detail",[$announcement->uuid])}}" class='btn btn-primary btn-round'>
                                        {{$announcement->typeOfExposure()}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
        @endforeach
        @endif

    </div>
@endsection
@section('scripts')
@endsection
