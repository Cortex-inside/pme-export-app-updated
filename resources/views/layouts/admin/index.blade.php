<!DOCTYPE html>
    <html lang="pt-Br" class="material-style layout-fixed">
    <head>
        <title>{{env("APP_NAME")}}</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="Aplicação para gestão de cursos" />
        <meta name="keywords" content="Cursos, gestão">
        <meta name="author" content="Fabio Rocha" />
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

        <!-- Icon fonts -->
        <link rel="stylesheet" href="/assets/fonts/fontawesome.css">
        <link rel="stylesheet" href="/assets/fonts/ionicons.css">
        <link rel="stylesheet" href="/assets/fonts/linearicons.css">
        <link rel="stylesheet" href="/assets/fonts/open-iconic.css">
        <link rel="stylesheet" href="/assets/fonts/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="/assets/fonts/feather.css">

        <!-- Core stylesheets -->
        <link rel="stylesheet" href="/assets/css/bootstrap-material.css">
        <link rel="stylesheet" href="/assets/css/shreerang-material.css">
        <link rel="stylesheet" href="/assets/css/uikit.css">

        <!-- Libs -->
        <link rel="stylesheet" href="/assets/libs/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="/assets/libs/flot/flot.css">
        <link rel="stylesheet" href="/css/custom.css">

        @yield('css')

        {{--<link rel="stylesheet" href="/css/admin-custom.css">--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">


    </head>
<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->


    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            @include("layouts.admin.menu")
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center container-p-x bg-primary"
                     id="layout-navbar">

                    <!-- Brand demo (see assets/css/demo/demo.css) -->
                    <a href="/admin" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            {{--<img src="/assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">--}}
                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">{{env("APP_NAME")}}</span>
                    </a>

                    <!-- Sidenav toggle (see /assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center ml-auto">

                            {{--@include("layouts.admin.message-chat")--}}

                            <div class=" nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-language navbar-icon align-middle"></i>
                                    <span class="d-lg-none align-middle">&nbsp;  @lang("sistema.alterar_idioma")</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        @lang("sistema.alterar_idioma")
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <a href="{{route("change.language","pt")}}" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm  @if(session()->get('locale') == "pt")
                                                    bg-info @else bg-secondary  @endif border-0
                                            text-white">PT</div> &nbsp; &nbsp;
                                            @lang('sistema.lang_pt')
                                        </a>
                                        <a href="{{route("change.language","en")}}" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm  @if(session()->get('locale') == "en")
                                                    bg-info  @else bg-secondary @endif border-0
                                            text-white">EN</div> &nbsp; &nbsp;
                                            @lang('sistema.lang_en')
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Divider -->
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        @if(Auth::user()->company != null)
                                            <img src="{{Auth::user()->company->photo}}" alt class="d-block ui-w-30 rounded-circle">
                                        @else
                                            <img src="/img/logo/logo-316x352.png" alt class="d-block ui-w-30 rounded-circle">
                                        @endif
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{Auth::user()->name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    @hasanyrole('empresa|empresa_estrangeira')
                                    <a href="{{route("sysCompany.company.users.change_password", Auth::user()->uuid)}}" class="dropdown-item">
                                        <i class="feather icon-user text-muted"></i> &nbsp; Trocar Senha</a>
                                    @else
                                        <a href="{{route("users.edit", Auth::user()->uuid)}}" class="dropdown-item">
                                            <i class="feather icon-user text-muted"></i> &nbsp; Perfil</a>
                                    @endhasanyrole


                                    <div class="dropdown-divider"></div>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                                        <i class="feather icon-power text-danger"></i> &nbsp; Sair</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                <!-- [ content ] Start -->
                <div class="container-fluid flex-grow-1 container-p-y">
                    @yield('header')
                    @yield('content')
                </div>

                <!-- [ Layout footer ] Start -->
                <nav class="layout-footer footer bg-white">
                        <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
                            <div class="pt-3">
                                <span class="footer-text font-weight-semibold">&copy; <a href="{{ url('/') }}"
                                                                                         class="footer-link"
                                                                                         target="_blank">PmeExporte</a></span>
                            </div>
                            <div>
                                <a href="{{ route('site.sobre') }}" class="footer-link pt-3" target="_blank">Quem somos?</a>
                                <a href="{{ route('site.suporte') }}" class="footer-link pt-3 ml-4" target="_blank">Suporte</a>
                            </div>
                        </div>
                    </nav>
                <!-- [ Layout footer ] End -->
                </div>
                  <!-- [ Layout content ] Start -->
            </div>
        <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

  <!-- Core scripts -->
      <script src="/assets/js/pace.js"></script>
      <script src="/assets/js/jquery-3.3.1.min.js"></script>
      <script src="/assets/libs/popper/popper.js"></script>
      <script src="/assets/js/bootstrap.js"></script>
      <script src="/assets/js/sidenav.js"></script>
      <script src="/assets/js/layout-helpers.js"></script>
      <script src="/assets/js/material-ripple.js"></script>

      <!-- Libs -->
      <script src="/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

      <script src="/assets/js/demo.js"></script>

      @yield('scripts')

</body>

</html>
