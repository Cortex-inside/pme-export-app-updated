@extends('layouts.website')

@section('content')
    <style>
        .boxCertificate {
            margin-top: 20px !important;
        }
    </style>
    <!-- start section -->
    <section class="section" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-4 col-xl-3">
                    <div class="col-MB-30">
                        <h2>Certificações PME-Exporte</h2>
                    </div>
                </div>

                <div class="col-xs-12 col-lg-8 col-xl-9">
                    <h4>
                        A certificação é o conjunto de ferramentas e formações dadas pelo IPEME com o objetivo de:
                    </h4>

                    <p>
                        a) Estruturar, profissionalizar e modernizar PME's com capacidade e potencial de exportação;
                    </p>

                    <p>
                        b) Diversificar a base de exportação a partir da internacionalização das PME's e valorização inclusiva da produção;
                    </p>

                    <p>
                        c) Institucionalizar um mecanismo de assistência técnica PME voltada para a exportação com base na marca e selo PME-Exporte.
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section">
        <div class="container">

            <ul id="gallery-set">
                <li><a class="selected" data-cat="*" href="#">Todos</a></li>
                @foreach($listCertificateCategory as $category)
                    <li><a data-cat="{{$category->nameFilter()}}" href="#">{{$category->name}} </a></li>
                @endforeach
            </ul>


            <div class="gallery gallery--style-2">
                <div class="gallery__inner">
                    <div class="row  js-isotope" data-isotope-options='{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}'>
                    @foreach($listCertificate as $certificate)
                            <br />
                            <!-- start item -->
                            <div  class="col-xs-12 boxCertificate col-md-6 col-lg-4  js-isotope__item {{$certificate->nameFilter()}}">

                                <h3 class="product__item__title"><a href="{!! route('sysCompany.certificates.requestCertificate', [$certificate->uuid]) !!}">{{$certificate->name}}</a></h3>

                                <p>
                                    {!! nl2br($certificate->description) !!}
                                </p>
                            </div>
                            <!-- end item -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include("site.contact-direct")

@endsection
