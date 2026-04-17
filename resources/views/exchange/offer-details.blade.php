@extends('layouts.admin.index')
@section('css')
    <link rel="stylesheet" href="/assets/css/pages/projects.css">

    <link rel="stylesheet" href="/assets/libs/blueimp-gallery/gallery.css">
    <link rel="stylesheet" href="/assets/libs/blueimp-gallery/gallery-indicator.css">

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
    <!-- / Header -->

    <div class="row">
        <div class="col">

            <!-- Description -->
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
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fa  fa-map-marker bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong> Local de Entrega:</strong>  {{$announcement->local_entrega}} <span class="text-muted float-right small">Local de Entrega </span></h6>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-auto pr-0">
                                <i class="fa  fa-truck bg-primary feed-icon chart-shadow-primary"></i>
                            </div>
                            <div class="col">
                                <h6 class="mb-1"><strong>Logística:</strong>  {{$announcement->logistica}}<span class="text-muted float-right small">Logística</span></h6>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($announcement->announcementsImages->count())
            <!-- Attached files -->
                <div class="card mb-4">
                    <h6 class="card-header">Galeria de imagens</h6>
                    <div class="card-body p-3">
                        <div class="row no-gutters">
                            <div class="container-fluid flex-grow-1 container-p-y">
                                <div id="gallery-lightbox" class="blueimp-gallery blueimp-gallery-controls">
                                    <div class="slides"></div>
                                    <h3 class="title"></h3>
                                    <a class="prev">‹</a>
                                    <a class="next">›</a>
                                    <a class="close">×</a>
                                    <a class="play-pause"></a>
                                    <ol class="indicator"></ol>
                                </div>
                                <div id="gallery-thumbnails" class="row form-row">
                                    <div class="gallery-sizer col-sm-6 col-md-6 col-xl-3 position-absolute"></div>
                                    @foreach($announcement->announcementsImages as $image)
                                    <div class="gallery-thumbnail col-sm-6 col-md-6 col-xl-3 mb-2" data-tag="nature">
                                        <a href="{{$image->url }}" class="img-thumbnail img-thumbnail-zoom-in">
                                            <span class="img-thumbnail-overlay bg-dark opacity-25"></span>
                                            <span class="img-thumbnail-content display-4 text-white">
                                        <i class="ion ion-ios-search"></i>
                                    </span>
                                            <img src="{{$image->url }}" class="img-fluid" alt="images">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            @endif

                <!-- / Description -->
                {{--@if($announcement->announcementsImages->count())--}}
                {{--<!-- Attached files -->--}}
                {{--<div class="card mb-4">--}}
                    {{--<h6 class="card-header">Galeria de imagens</h6>--}}
                    {{--<div class="card-body p-3">--}}
                        {{--<div class="row no-gutters">--}}
                            {{--<div class="swiper-container" id="swiper-3d-flip-effect">--}}
                                {{--<div class="swiper-wrapper">--}}
                                {{--@foreach($announcement->announcementsImages as $image)--}}
                                    {{--<!-- 3D flip effect -->--}}
                                        {{--<div class="swiper-slide"><img src="{{$image->url }}" class="img-thumbnail" /> </div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                                {{--<div class="swiper-pagination"></div>--}}
                                {{--<div class="swiper-button-next custom-icon">--}}
                                    {{--<i class="lnr lnr-chevron-right text-muted"></i>--}}
                                {{--</div>--}}
                                {{--<div class="swiper-button-prev custom-icon">--}}
                                    {{--<i class="lnr lnr-chevron-left text-muted"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            <!-- / Description -->
            @if($announcement->announcementsDocuments->count())
            <!-- Attached files -->
            <div class="card mb-4">
                <h6 class="card-header">Documentos Anexos</h6>
                <div class="card-body p-3">
                    <div class="row no-gutters">
                        @foreach($announcement->announcementsDocuments as $document)
                            <div class="col-md-6 col-lg-12 col-xl-6 p-1">

                                <div class="project-attachment ui-bordered p-2">
                                    <div class="project-attachment-file display-4">
                                        <i class="far fa-file-pdf"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <strong class="project-attachment-filename"><a href="{{$document->url }}">Arquivo {{$document->id}}</a></strong>
                                        {{--<div class="text-muted small">156KB</div>--}}
                                        <div>
                                            <a href="{{$document->url }}" target="_blank">Visualizar</a> &nbsp;
                                            <a href="{{$document->url }}" target="_blank">Download</a>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- / Attached files -->
            @endif
        </div>
        @if(Auth::user()->company_id != $announcement->company_id)
            <div class="col-md-4 col-xl-3">
                <!-- Project details -->
                <div class="card mb-4">
                    <h6 class="card-header">Indicação {{$announcement->typeVendaCompra()}} - {{date("d/m/Y")}}</h6>
                    <ul class="list-group list-group-flush">
                        @if($announcement->type_of_exposure == 1 OR
                                $announcement->type_of_exposure == 2 OR
                                $announcement->type_of_exposure == 3 OR
                                $announcement->type_of_exposure == 4)

                            @if($announcement->type_of_exposure == 1)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{route("exchange.request.offer",[$announcement->uuid])}}"
                                       class="btn btn-block btn-warning btn-lg">Negociar Venda</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{route("exchange.request.confirm-close",[$announcement->uuid])}}" class="btn btn-block btn-success btn-lg btnFecharnegocio">Fechar Negócio</a>
                                </li>
                            @endif

                        @endif

                        @if($announcement->type_of_exposure == 5 OR
                                $announcement->type_of_exposure == 6 OR
                                $announcement->type_of_exposure == 7 OR
                                $announcement->type_of_exposure == 8)

                            @if($announcement->type_of_exposure == 5)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{route("exchange.request.offer",[$announcement->uuid])}}"
                                       class="btn btn-block btn-warning btn-lg">Negociar Compra</a>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{route("exchange.request.confirm-close",[$announcement->uuid])}}" class="btn btn-block btn-success btn-lg">Fechar Negócio</a>
                                </li>
                            @endif

                        @endif

                        @if(
                            $announcement->type_of_exposure == 2 OR
                            $announcement->type_of_exposure == 3 OR
                            $announcement->type_of_exposure == 4 OR
                            $announcement->type_of_exposure == 6 OR
                            $announcement->type_of_exposure == 7 OR
                            $announcement->type_of_exposure == 8)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{route("exchange.request.offer",[$announcement->uuid])}}" class="btn btn-block btn-warning btn-lg">Contra Indicação</a>
                                </li>
                        @endif

                    </ul>
                </div>
                <!-- / Project details -->
            </div>
        @endif

    </div>
@endsection

@section('scripts')
    {{--<script src="//assets/libs/swiper/swiper.js"></script>--}}
    {{--<script src="/assets/js/pages/ui_carousel.js"></script>--}}


    <!-- Libs -->
    <script src="/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery-fullscreen.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery-indicator.js"></script>
    <script src="/assets/libs/masonry/masonry.js"></script>
    <script src="/assets/js/pages/pages_gallery.js"></script>
@endsection
