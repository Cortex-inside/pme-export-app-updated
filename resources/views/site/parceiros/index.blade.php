@extends('layouts.website')

@section('content')

    <section class="section">
        <div class="container">
            <ul id="gallery-set">
                <li><a class="selected" data-cat="*" href="#">Todos</a></li>
                <li><a data-cat="category-1" href="#">Estratégicos</a></li>
                <li><a data-cat="category-2" href="#">Patrocinadores</a></li>
                <li><a data-cat="category-3" href="#">Tecnológicos</a></li>
                <li><a data-cat="category-4" href="#">Apoio</a></li>
            </ul>

            <div class="gallery gallery--style-1">
                <div class="gallery__inner">
                    <div class="row row-no-gutter js-isotope" data-isotope-options='{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}'>
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-1">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/ampcm.jpg');" alt="AMCM" />

                                        <a class="gallery__item__description" href="../img/parceiros/ampcm.jpg" data-gallery="AMCM">
                                            <span class="gallery__item__title">AMCM</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/anje.jpg');" alt="ANJE" />

                                        <a class="gallery__item__description" href="http://player.vimeo.com/video/95974049" data-gallery="ANJE">
                                            <span class="gallery__item__title">ANJE</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-3">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/bindzu.jpg');" alt="BINDZU" />

                                        <a class="gallery__item__description" href="../img/parceiros/bindzu.jpg" data-gallery="BINDZU">
                                            <span class="gallery__item__title">BINDZU</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/cortexArtboard 1.png');" alt="CORTEX ARTBOARD" />

                                        <a class="gallery__item__description" href="../img/parceiros/cortexArtboard 1.png" data-gallery="CORTEX ARTBOARD">
                                            <span class="gallery__item__title">CORTEX ARTBOARD</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-1">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/CPLP.png');" alt="CPLP" />

                                        <a class="gallery__item__description" href="../img/parceiros/CPLP.png" data-gallery="CPLP">
                                            <span class="gallery__item__title">CPLP</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/cta.jpg');" alt="CTA" />

                                        <a class="gallery__item__description" href="../img/parceiros/cta.jpg" data-gallery="CTA">
                                            <span class="gallery__item__title">CTA</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-1 category-3">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/gain.jpg');" alt="GAIN" />

                                        <a class="gallery__item__description" href="../img/parceiros/gain.jpg" data-gallery="GAIN">
                                            <span class="gallery__item__title">GAIN</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/inno.jpg');" alt="INNO" />

                                        <a class="gallery__item__description" href="../img/parceiros/inno.jpg" data-gallery="INNO">
                                            <span class="gallery__item__title">INNO</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->


                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/IPI.jpg');" alt="IPI" />

                                        <a class="gallery__item__description" href="../img/parceiros/IPI.jpg" data-gallery="IPI">
                                            <span class="gallery__item__title">IPI</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/IPIM.jpg');" alt="IPIM" />

                                        <a class="gallery__item__description" href="../img/parceiros/IPIM.jpg" data-gallery="IPIM">
                                            <span class="gallery__item__title">IPIM</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/LETSEGO.jpg');" alt="LETSEGO" />

                                        <a class="gallery__item__description" href="../img/parceiros/LETSEGO.jpg" data-gallery="LETSEGO">
                                            <span class="gallery__item__title">LETSEGO</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/NSIC.jpg');" alt="NSIC" />

                                        <a class="gallery__item__description" href="../img/parceiros/NSIC.jpg" data-gallery="NSIC">
                                            <span class="gallery__item__title">NSIC</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->


                        <!-- start item -->
                        <div class="col-xs-12 col-md-6  js-isotope__item  category-2 category-4">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="../img/blank.gif" style="background-image: url('../img/parceiros/Vodacom.png');" alt="Vodacom" />

                                        <a class="gallery__item__description" href="../img/parceiros/Vodacom.png" data-gallery="Vodacom">
                                            <span class="gallery__item__title">Vodacom</span>
                                            <span class="gallery__item__subtitle">Patrocinador</span>
                                        </a>
                                    </figure>
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
