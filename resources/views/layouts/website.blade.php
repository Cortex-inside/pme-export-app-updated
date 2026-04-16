<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>@lang("sistema.NomeApp")</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="PME-EXPORTE Ferramenta para as cooperativas de produtores de MPME – Instituto para Promoção de Pequenas e Médias Empresas (Moçambique) O Instituto para a Promoção das Pequenas e Médias Empresas">

    <meta property="og:url" content="{{ url('/sobre') }}" />
    <meta property="og:image" content="{{ asset('img/logo/logo-316x352.png') }}" />

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />

    <meta name="theme-color" content="#4A8B71" />
    <meta name="msapplication-navbutton-color" content="#4A8B71" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#4A8B71" />

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png">

    @yield('css')

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/style.min.css" type="text/css">
    <link rel="stylesheet" href="/css/alteracoes.css" type="text/css">

    <!-- Load google font
    ================================================== -->
    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Poppins:300,400,500,600,700', 'Raleway:400,400i,500,500i,700,700i'] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>

    <!-- Load other scripts
    ================================================== -->
    <script type="text/javascript">
      var _html = document.documentElement;
      _html.className = _html.className.replace("no-js","js");
    </script>
    <script type="text/javascript" src="/js/device.min.js"></script>


</head>

<body class="page page-home">

<!-- start top bar -->
<div id="top-bar" class="fixed in">
    <div class="container">
        <a id="top-bar__logo" class="site-logo" href="/">PME Exporte</a>

        <a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

        <nav id="top-bar__navigation" role="navigation">
            <ul>
                <li class="{{(Route::is("site.index"))? "current": ""}}" ><a href="{{route('site.index')}}">@lang("website.Principal")</a></li>
                <li class="{{(Route::is("site.produtos"))? "current": ""}}"><a href="{{route('site.produtos')}}">@lang("website.Produtos")</a></li>

                <li class="{{(Route::is("site.certificacao-online") OR Route::is("site.club-pme"))? "current": ""}}">
                    <a href="javascript:void(0);">@lang("website.CertificacaoPME")</a>
                    <div class="submenu">
                        <ul>
                            <li class="{{(Route::is("site.certificacao-online"))? "current": ""}}"><a href="{{route('site.certificacao-online')}}">CERTIFICAÇÕES ONLINE</a></li>
                            <li class="{{(Route::is("site.club-pme"))? "current": ""}}"><a href="{{route('site.club-pme')}}">CLUBE PME</a></li>
                        </ul>
                    </div>
                </li>
                <li  class="{{(Route::is("site.parceiros"))? "current": ""}}"><a href="{{route("site.parceiros")}}">@lang("website.Parceiros")</a></li>
                <li class="{{(Route::is("site.sobre"))? "current": ""}}"><a href="{{route('site.sobre')}}">@lang("website.Sobre")</a></li>

                <li class="" style="float: right; margin-left: 50px;">
                    <a href="#">{{session('locale')}}</a>

                    <div class="submenu">
                        <ul>
                            <li><a href="{{route("change.language","pt")}}">PT</a></li>
                            <li><a href="{{route("change.language","en")}}">EN</a></li>
                        </ul>
                    </div>
                </li>
                @auth
                    <li class="li-btn"><a class="custom-btn primary" href="{{route('exchange.index')}}">@lang("website.MinhaConta")</a></li>
                @else
                    <li class="li-btn"><a class="custom-btn primary" href="{{route('login')}}">@lang("website.Entrar")</a></li>
                    <li class="li-btn"><a class="custom-btn primary" href="{{route('register')}}">@lang("website.Cadastrar")</a></li>
                @endauth

            </ul>
        </nav>
    </div>
</div>

<!-- start header bar -->
@if(Route::is('site.certificacao-online'))
    @include("site.certificacao.header-online")
@endif
@if(Route::is('site.club-pme'))
    @include("site.certificacao.header-club")
@endif
@if(Route::is('site.produtos'))
    @include("site.produtos.header-product")
@endif
@if(Route::is('site.parceiros'))
    @include("site.parceiros.header-parceiros")
@endif
<!-- end header bar -->

<main role="main">
    @yield('content')
</main>

<footer id="footer" class="footer--style-1">
    <div class="footer__inner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="footer__item">
                        <a class="site-logo" href="/">IPEME</a>

                        <p class="footer__copy">© 2018, IPEME.Todos direitos reservados.<br />Desenvolvido por <a href="#" target="_blank">Cortex Lda</a></p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="footer__item">
                        <h3 class="footer__title">Menu Adicional</h3>

                        <div class="row">
                            <div class="col-xs">
                                <ul class="footer__menu">
                                    <li><a href="{{route('site.index')}}">Principal</a></li>
                                    <li><a href="{{route('site.produtos')}}">Produtos</a></li>
                                    <li><a href="{{route('site.certificacao-online')}}">Certificações PME</a></li>
                                    <li><a href="{{route('site.club-pme')}}">Club PME</a></li>
                                    <li><a href="{{route('site.contato')}}">Contactos</a></li>
                                </ul>
                            </div>

                            <div class="col-xs">
                                <ul class="footer__menu">
                                    @auth
                                        @hasanyrole('empresa|empresa_estrangeira')
                                            <li><a href="{{route('exchange.index')}}">Minha conta</a></li>
                                        @else
                                            <li><a href="/admin">Minha conta</a></li>
                                        @endhasanyrole
                                    @endauth
                                    <li><a href="{{route('site.suporte')}}">Suporte</a></li>
                                    <li><a href="{{route('site.faq')}}">Perguntas Frequentes</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4">
                    <div class="footer__item">
                        <h3 class="footer__title">Newslatter</h3>

                        <form class="footer__form form-horizontal" action="{{route("site.newsletter")}}" method="post">

                            {!! csrf_field() !!}

                            <p>Receba o nosso Newslatter, e esteja informado sobre todas actualizações e oportunidades da nossa Plataforma Exporte </p>

                            <div class="b-table">
                                <div class="cell v-bottom">
                                    <label class="input-wrp">
                                        <input class="textfield" type="text" name="email" placeholder="E-mail" />
                                    </label>
                                </div>

                                <div class="cell v-bottom">
                                    <button class="custom-btn primary" type="submit" role="button">Subscrever</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="btn-to-top-wrap">
    <a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="1000"></a>
</div>

<script type="text/javascript" src="/js/main.min.js"></script>

@yield('scripts')

</body>
</html>
