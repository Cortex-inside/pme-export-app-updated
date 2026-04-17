@extends('layouts.website')

@section('content')

    @include("site.slide")

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-xl-3">
                    <div class="col-MB-30">
                        <h3>PME-EXPORTE Ferramenta para as cooperativas de produtores de MPME </h3>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-8 col-xl-9">
                    <div class="col-MB-30">
                        <h4>
                            O mercado do AGOA constitui uma grande janela de oportunidade para a colocação de produtos
                            de MPME’s nacionais e deste modo alargar e diversificar a base de exportação do país.

                        </h4>
                        <p>
                            Não obstante, as MPME’s enfrentarem diversos constrangimentos de natureza estrutural como o
                            acesso ao conhecimento técnico, tecnologia apropriadas, escala de produção reduzida,
                            financiamentos, e fraca capacidade competitiva, um programa de promoção, assistência e
                            acompanhamento dedicado de curto médio e longo prazo pode permitir um maior
                            aproveitamento deste mercado.
                        </p>
                    </div>

                    <div class="feature feature--style-1">
                        <div class="feature__inner">
                            <div class="row flex-items-xs-between">
                                <!-- start item -->

                                <!-- end item -->

                                <!-- start item -->
                                <div class="col-xs">
                                    <div class="feature__item">
                                        <i class="feature__item__ico feature__item__ico--2"></i>

                                        <h3 class="feature__item__title  h4">Produção<br />de Vegetais</h3>
                                    </div>
                                </div>
                                <!-- end item -->

                                <!-- start item -->
                                <div class="col-xs">
                                    <div class="feature__item">
                                        <i class="feature__item__ico feature__item__ico--3"></i>

                                        <h3 class="feature__item__title  h4">Produtos<br /> de Animais</h3>
                                    </div>
                                </div>
                                <!-- end item -->

                                <!-- start item -->
                                <div class="col-xs">
                                    <div class="feature__item">
                                        <i class="feature__item__ico feature__item__ico--4"></i>

                                        <h3 class="feature__item__title  h4">Escala de Produção<br />Elevada</h3>
                                    </div>
                                </div>
                                <!-- end item -->

                                <!-- start item -->
                                <div class="col-xs">
                                    <div class="feature__item">
                                        <i class="feature__item__ico feature__item__ico--5"></i>

                                        <h3 class="feature__item__title  h4">Técnicas<br />Modernas</h3>
                                    </div>
                                </div>
                                <!-- end item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <section class="section section--no-pt section--no-pb section--background-base-light">
        <div class="container">
            <div class="gallery gallery--style-3">
                <div class="gallery__inner">
                    <div class="row row-no-gutter flex-items-sm-middle">
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="gallery__item gallery__item--text">
                                <h1>CADEIA DE VALORES DE PRODUTOS</h1>


                                <p>
                                    Aprecia o maior catálogo de agro-negócios, com os maiores fornecedores locais
                                    e recomedados.
                                </p>

                                <a class="gallery-more-link" href="{!! route('site.produtos') !!}">Ver todas as categorias</a>
                            </div>
                        </div>
                        <!-- end item -->

                        @foreach($listProductCategories as $category)
                        <!-- start item -->
                        <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="gallery__item">
                                <div class="gallery__item__inner">
                                    <figure>
                                        <img src="{{ $category->photo_url }}" alt="{{ $category->name }}" style="width:100%;height:240px;object-fit:cover;" />

                                        <a class="gallery__item__description" href="{!! route('exchange.index', ['category_id' => $category->id]) !!}" >
                                            <span class="gallery__item__title">Ver ofertas</span>
                                            <span class="gallery__item__subtitle">{{$category->name}}</span>
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- start section -->
    <section class="section section--background-base-light section--background-logo">
        <div class="container">
            <div class="section-heading section-heading--left">
                <h2 class="title">A agenda da Década IPEME </h2>
            </div>

            <div class="timeline">
                <div class="timeline__inner">
                    <div class="row">
                        <!-- start item -->
                        <div class="col-md-4">
                            <div class="timeline__item">
                                <p class="timeline__year">2008-2013</p>

                                <h4 class="timeline__title">Conhecer</h4>

                                <p>
                                    Base e perfil do seu RH.
                                    Eficácia do Quadro Orientador PME
                                    Eficácia do Quadro Legal PME
                                    Impacto da aplicação das Metodologias PME
                                </p>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-md-4">
                            <div class="timeline__item">
                                <p class="timeline__year">2013-2018</p>

                                <h4 class="timeline__title">Reflectir<br /></h4>

                                <p>
                                    Consistência dos Programas PME.
                                    Relevância dos Serviços PME
                                    Oportunidade e eficácia das Plataformas PME
                                </p>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-md-4">
                            <div class="timeline__item">
                                <p class="timeline__year">Próxima <br/>Década</p>

                                <h4 class="timeline__title">Melhorar</h4>

                                <p>
                                    Foco Estratégico.
                                    Dinamização do Ecosistema
                                    Mobilização de Recursos.
                                </p>
                            </div>
                        </div>
                        <!-- end item -->


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->


    <!-- start section -->
    <section class="section">
        <div class="container">
            <div class="section-heading section-heading--center">
                <h2 class="title">O que estão a falar de Nós</h2>
            </div>

            <div class="row flex-items-md-center">
                <div class="col-lg-10">
                    <div class="feedbacks feedbacks--slider feedbacks--style-2">
                        <div class="owl-carousel owl-theme">
                            <!-- start item -->
                            <article class="feedback__item">
                                <div class="feedback__author">
                                    <div class="feedback__author__photo  mx-auto">
                                        <img class="circled  img-fluid" src="../img/users_photos/4.png" height="140" width="140" alt="demo" />
                                    </div>

                                    <h4 class="feedback__author__name">Dr.Claire Zimba</h4>

                                    <p class="feedback__author__position">Director Geral, IPEME</p>
                                </div>

                                <div class="feedback__text">
                                    <p>
                                        “Lançamos esta plataforma, a pensar no potencial de diversificação da base de exportação que as MPME's e cooperativas de produtores podem
                                        e devem dar a estrutura da economia. Acreditamos nesta plataforma, como instrumento de inclusão econômica, porque ela vai ser consolidada com a contribuição das próprias PME's e também das grandes empresas e dos consumidor..Esta plataforma marca e assinala o arranque das celebrações da "década IPEME". siga-nos
                                    </p>
                                </div>
                            </article>
                            <!-- end item -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section">
        <div class="container">
            <div class="partners">
                <div class="partners__inner">
                    <div class="row">
                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/100PMES.jpg" alt="100PMES" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/cadup.jpg" alt="CADUP" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/core.jpg" alt="CORE" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/ctc.jpg" alt="CTC" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/EP.jpg" alt="EP" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/FIEI.jpg" alt="FIEI" />
                        </div>
                        <!-- end item -->


                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/Financiamento.jpg" alt="Financiamento" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/ideiascriativas.jpg" alt="ideiascriativas" />
                        </div>
                        <!-- end item -->
                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/IE.jpg" alt="IE" />
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/moznegocios.jpg" alt="moznegocios" />
                        </div>
                        <!-- end item -->
                        <!-- start item -->
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <img class="img-fluid" src="../img/partners_img/Proger.jpg" alt="Proger" />
                        </div>
                        <!-- end item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    @include("site.contact-direct")

@endsection
