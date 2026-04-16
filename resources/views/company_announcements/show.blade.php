@extends('layouts.admin.index')
@section('css')
    <link rel="stylesheet" href="/assets/css/pages/projects.css">
    <link rel="stylesheet" href="/assets/libs/blueimp-gallery/gallery.css">
    <link rel="stylesheet" href="/assets/libs/blueimp-gallery/gallery-indicator.css">
@endsection
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        <div class="">
            {!! Form::open(['route' => ['sysCompany.companyAnnouncements.destroy', $announcement->uuid], 'method' =>
            'delete']) !!}
            <div class='btn-group pull-right'>
                @can('sysCompany.companyAnnouncements.destroy')
                {!! Form::button('<i class="feather icon-trash-2"></i>Excluir', ['type' => 'submit', 'class' => 'btn
                btn-danger', 'onclick' => "return confirm('Tem certeza que quer apagar esse item?')"]) !!}
                @endcan
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("sysCompany.companyAnnouncements.show",
            $announcement->uuid)
            }}">Meu Certificado</a></li>
        </ol>
    </div>
@endsection

@section('content')
    <section class="content-header">
        <div class="page-header">
            <form action="{{ route('sysCompany.companyAnnouncements.destroy', $announcement->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deseja realmente excluir esse item?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <div class="btn-group pull-right" role="group" aria-label="...">
                    {{--@can('user.edit')--}}
                    {{--<a class="btn btn-warning btn-group" role="group" href="{{ route('users.edit', $user->uuid) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>--}}
                    {{--@endcan--}}
                    @can('companyAnnouncements.destroy')
                    <button type="submit" class="btn btn-danger">Excluir <i class="glyphicon glyphicon-trash"></i></button>
                    @endcan
                </div>
            </form>
        </div>
    </section>

    <div class="card mb-4">
        <h6 class="card-header">Anúncios / Exibir</h6>
        <div class="card-body">
            @include('company_announcements.show_fields')

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

    @if($announcement->announcementsDocuments->count())
    <div class="card mb-4">
        <h6 class="card-header">Documentos</h6>
        <div class="card-body">

            <!-- Updated At Field -->
            <div class="form-group">
                {!! Form::label('updated_at', 'Documentos:', ['class'=>'form-label']) !!}
                    @foreach($announcement->announcementsDocuments as $document)
                        <div class="row">
                            <div class="col-md-2"><a href="{{$document->url }}" target="_blank" class="btn btn-success btn-sm">Visualizar: </a>
                            </div>
                            <div class="col-md-10">{{$document->original_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                    @endforeach
            </div>

        </div>
    </div>
    @endif


    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('sysCompany.companyAnnouncements.indexByCompany') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/assets/libs/swiper/swiper.js"></script>
    <script src="/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery-fullscreen.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery-indicator.js"></script>
    <script src="/assets/libs/masonry/masonry.js"></script>
    <script src="/assets/js/pages/pages_gallery.js"></script>
@endsection
