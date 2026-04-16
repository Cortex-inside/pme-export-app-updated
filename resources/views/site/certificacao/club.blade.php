@extends('layouts.website')

@section('content')
    <section class="section">
        <div class="container">
            <ul id="gallery-set">
                <li><a class="selected" data-cat="*" href="#">Todos</a></li>
                <li><a data-cat="category-1" href="#">Oleaginosas</a></li>
                <li><a data-cat="category-2" href="#">Vegetais</a></li>
                <li><a data-cat="category-3" href="#">Frutas</a></li>
                <li><a data-cat="category-4" href="#">Plantas</a></li>
            </ul>

            <div class="gallery gallery--style-2">
                <div class="gallery__inner">
                    <div class="row  js-isotope" data-isotope-options='{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}'>
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-1">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/1.jpg');" alt="demo" />

                                        <a href="https://www.youtube.com/embed/1zG1iq9LZ2U" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Gergelim</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-2">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/2.jpg');" alt="demo" />

                                        <a href="http://player.vimeo.com/video/95974049" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Tasty Species</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-3">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/3.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/3.jpg" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Bannana Life</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/4.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/4.jpg" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Beautiful Fruits</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-1">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/5.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/5.jpg" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Castanha de Caju</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-2">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/6.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/6.jpg#" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Dark Grape</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-1 category-3">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/7.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/7.jpg" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Amendoim </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/8.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/8.jpg" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Papper Fields</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/gall_img/3_col/9.jpg');" alt="demo" />

                                        <a href="../img/gall_img/3_col/9.jpg" data-gallery="gall"></a>
                                    </figure>
                                </div>

                                <div class="gallery__item__description">
                                    <span class="gallery__item__title">Carrot in the Kitchen</span>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a id="gallery-more-btn" class="custom-btn big primary" href="javascript:void(0);">Mostrar mais</a>
            </div>
        </div>
    </section>
    <!-- end section -->

    @include("site.contact-direct")

@endsection
