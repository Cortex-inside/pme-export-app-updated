@extends('layouts.admin.index')

@section('css')
    <link rel="stylesheet" href="/assets/libs/blueimp-gallery/gallery.css">
    <link rel="stylesheet" href="/assets/libs/blueimp-gallery/gallery-indicator.css">
@endsection
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        <div class="">
            @can('productCategories.edit')
            <a href="{!! route('productCategories.edit', [$productCategory->uuid]) !!}" class='btn
                    btn-info'><i class="far fa-edit"></i> Editar</a>&nbsp;
            @endcan
        </div>
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("productCategories.index")}}">Categorias de Produtos</a></li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Categoria de Produto</h6>
        <div class="card-body">
            @include('product_categories.show_fields')

        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('productCategories.index') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script src="/assets/libs/swiper/swiper.js"></script>
    <script src="/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery-fullscreen.js"></script>
    <script src="/assets/libs/blueimp-gallery/gallery-indicator.js"></script>
    <script src="/assets/libs/masonry/masonry.js"></script>
    <script src="/assets/js/pages/pages_gallery.js"></script>
@endsection