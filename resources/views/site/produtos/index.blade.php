@extends('layouts.website')

@section('content')


    <section class="section">
        <div class="container">
            <ul id="gallery-set">
                <li><a class="selected" data-cat="*" href="#">Todos</a></li>
                @foreach($listProductCategories as $category)
                <li><a data-cat="{{$category->nameFilter()}}" href="#">{{$category->name}} </a></li>
                @endforeach
            </ul>

            <div class="gallery gallery--style-2">
                <div class="gallery__inner">
                    <div class="row  js-isotope" data-isotope-options='{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}'>
                        @foreach($listProductCategories as $category)
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item {{$category->nameFilter()}}">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="/img/blank.gif" style="background-image: url('{{$category->photo_url}}');" alt="demo" />

                                        <a class="gallery__item__description" href="{!! route('exchange.index') !!}" >
                                            <span class="gallery__item__title">{{$category->name}}</span>
                                            {{--<span class="gallery__item__subtitle">Fruits</span>--}}
                                        </a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">{{$category->name}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="text-center">
                <a id="gallery-more-btn" class="custom-btn big primary" href="javascript:void(0);">Mostrar mais</a>
            </div>
        </div>
    </section>

    @include("site.contact-direct")


@endsection
