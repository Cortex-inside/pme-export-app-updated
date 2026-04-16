<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>{{env('EMPRESA_NOME_TITLE')}}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Quer exportar e ter apoio para exportar? Quer divulgar o seu produto? Quer fazer parte do Clube das PME's e beneficiar de outros programas de apoio ao seu negocio? Inscreva-te ja no Catalogo PME Exporte" />
    <meta name="keywords" content="exportação, moçambique, produto">
    <meta name="author" content="FSITecnologia" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

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
    <!-- Page -->
    <link rel="stylesheet" href="/assets/css/pages/authentication.css">
</head>
<body class="hold-transition login-page" style="background-color: #008d4c2b !important;">
<div class="page-loader">
    <div class="bg-primary"></div>
</div>
<!-- [ Preloader ] End -->
<!-- [ content ] Start -->
<div class="authentication-wrapper authentication-3">
    <div class="authentication-inner">

        <!-- [ Side container ] Start -->
        <!-- Do not display the container on extra small, small and medium screens -->
        <div class="d-none d-lg-flex col-lg-8 align-items-center ui-bg-cover ui-bg-overlay-container p-5" style="background-image: url('/img/home_img/slide4.png');">
            <div class="ui-bg-overlay bg-dark opacity-50"></div>
            <!-- [ Text ] Start -->
            <div class="w-100 text-white px-5">
                <h1 class="display-2 font-weight-bolder mb-4">EXPORTAR ?<br></h1>
                <div class="text-large font-weight-light">
                    Quer exportar e ter apoio para exportar? Quer divulgar o seu produto? Quer fazer parte do Clube das PME's e beneficiar de outros programas de apoio ao seu negocio? Inscreva-te ja no Catalogo PME Exporte
                </div>
            </div>
            <!-- [ Text ] End -->
        </div>
        <!-- [ Side container ] End -->

        <!-- [ Form container ] Start -->
        <div class="d-flex col-lg-4 align-items-center bg-white p-5">
            <!-- Inner container -->
            <!-- Have to add `.d-flex` to control width via `.col-*` classes -->
            <div class="d-flex col-sm-7 col-md-5 col-lg-12 px-0 px-xl-4 mx-auto">
                <div class="w-100">

                    <!-- [ Logo ] Start -->
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="ui-w-140">
                            <div class="w-100 position-relative">
                                <img src="/img/logo/logo-316x352.png" alt="Brand Logo" class="img-fluid">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Logo ] End -->

                    <h4 class="text-center text-lighter font-weight-normal mt-5 mb-0">Acesso à Plataforma</h4>

                    <!-- [ Form ] Start -->
                    <form method="post" class="my-5" action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                            <div class="clearfix"></div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-end">
                                <span>Password</span>
                                <a href="{{ url('/password/reset') }}" class="d-block small">Esqueci a minha senha</a>
                            </label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="clearfix"></div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-0">
                            {{--<label class="custom-control custom-checkbox m-0">--}}
                                {{--<input type="checkbox" class="custom-control-input">--}}
                                {{--<span class="custom-control-label">Remember me</span>--}}
                            {{--</label>--}}
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                    <!-- [ Form ] End -->

                    <div class="text-center text-muted">
                        Não tem uma conta ainda ?
                        <a href="{{ url('/register') }}">Cadastrar</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- [ Form container ] End -->

    </div>
</div>
<!-- [ content ] End -->




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

<!-- Demo -->
<script src="/assets/js/demo.js"></script>

</body>

</html>