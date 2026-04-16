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
<body>
<div class="page-loader">
    <div class="bg-primary"></div>
</div>
<!-- [ Preloader ] End -->

<!-- [ content ] Start -->
<div class="authentication-wrapper authentication-2 px-4">
    <div class="authentication-inner py-5">

        <form method="post" action="{{ url('/password/reset') }}" class="card">
        {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="p-4 p-sm-5">
                <!-- [ Logo ] Start -->
                <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                    <div class="ui-w-140">
                        <div class="w-100 position-relative">
                            <img src="/img/logo/logo-316x352.png" alt="Brand Logo" class="img-fluid">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

            <!-- [ Logo ] End -->
                <h5 class="text-center text-muted font-weight-normal mb-4">Resetar a sua senha.</h5>
                <hr class="mt-0 mb-4">

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirma senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary btn-block">Resetar senha</button>
            </div>
        </form>
        <!-- [ Form ] End -->

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
