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
    <!-- Libs -->
    <link rel="stylesheet" href="/assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/libs/smartwizard/smartwizard.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">
</head>
<body>
<div class="page-loader">
    <div class="bg-primary"></div>
</div>
<!-- [ Preloader ] End -->

<!-- [ content ] Start -->
<div class="authentication-wrapper authentication-2 px-4">
    <div class="authentication-inner py-5" style="    max-width: 800px">
        <div class="card">
            <div class="p-4 p-sm-5">
                <!-- [ Logo ] Start -->
                <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                    <div class="ui-w-140">
                        <div class="w-100 position-relative">
                            <img src="/img/logo/logo-316x352.png"  style="width: 200px;
    height: 100%;
    margin-bottom: -70px;
    margin-top: -31px;" alt="PmeExporte" class="img-fluid">
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <h5 class="text-center text-muted font-weight-normal mb-4">Cadastro de Empresas</h5>
                <form method="post" action="{{ url('/register') }}">
                    {!! csrf_field() !!}
                    <div class="card-body">
                        <div class="form-group has-feedback{{ $errors->has('perfil') ? ' has-error' : '' }}">
                            <select class="form-control" name="perfil" id="perfil">
                                <option value="">Selecione o perfil da sua empresa</option>
                                <option value="1" @if(old('perfil') == 1) selected="selected" @endif>Local</option>
                                <option value="2" @if(old('perfil') == 2) selected="selected" @endif>Estrangeira</option>
                            </select>

                            @if ($errors->has('perfil'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('perfil') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 has-feedback{{ $errors->has('name') ? '
                            has-error' : '' }}">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome completo">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 has-feedback{{ $errors->has('email') ? ' has-error' : ''
                            }}">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar senha">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('companie_name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="companie_name" value="{{ old('companie_name') }}" placeholder="Nome da empresa">
                            <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>

                            @if ($errors->has('companie_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('companie_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        {{-- EMPRESA LOCAL --}}
                        <div class="form-row">
                            <div id="box_legal_situation_id" class="form-group col-md-6 has-feedback{{
                            $errors->has('legal_situation_id') ? ' has-error' : '' }}">
                                <select class="form-control" name="legal_situation_id" id="legal_situation_id">
                                    <option value="">Situação Legal</option>
                                    <option value="1" @if(old('legal_situation_id') == 1) selected="selected" @endif>Estatal</option>
                                    <option value="2" @if(old('legal_situation_id') == 2) selected="selected" @endif>Privada</option>
                                    <option value="3" @if(old('legal_situation_id') == 3) selected="selected" @endif>Mista</option>
                                    <option value="4" @if(old('legal_situation_id') == 4) selected="selected" @endif>Indefinido</option>
                                </select>

                                @if ($errors->has('legal_situation_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('legal_situation_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="box_district_id" class="form-group col-md-6 has-feedback{{ $errors->has
                            ('district_id') ? ' has-error' : '' }}">
                                <select class="form-control" name="district_id" id="district_id">
                                    <option value="">Selecione um distrito</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}"  @if(old('district_id') == $district->id) selected="selected" @endif>{{$district->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('district_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-row" id="pais" style="display: none">

                            <div id="" class="form-group col-md-6 has-feedback{{
                            $errors->has('country_id') ? ' has-error' : '' }}">
                                <select class="form-control" name="country_id" id="country_id">
                                    <option value="">@lang('sistema.selecione_pais')</option>
                                    @foreach($countrys as $country)
                                    <option value="{{$country->id}}">{{$country->sigla}} - {{$country->nome}}</option>
                                    @endforeach
                                </select>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                @if ($errors->has('country_id'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('country_id') }}</strong>
                                </span>
                                @endif
                            </div>


                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> Aceito o <a href="#">termo</a> de uso.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary btn-flat">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Core scripts -->
        <!-- Core scripts -->
        <script src="/assets/js/pace.js"></script>
        <script src="/assets/js/jquery-3.2.1.min.js"></script><!-- notification not work in jquery-3.3.1 js -->
        <script src="/assets/libs/popper/popper.js"></script>
        <script src="/assets/js/bootstrap.js"></script>
        <script src="/assets/js/sidenav.js"></script>
        <script src="/assets/js/layout-helpers.js"></script>
        <script src="/assets/js/material-ripple.js"></script>

        <!-- Libs -->
        <script src="/assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/assets/libs/smartwizard/smartwizard.js"></script>
        <script src="/assets/libs/validate/validate.js"></script>

        <!-- Demo -->
        <script src="/assets/js/demo.js"></script>
        <script src="/assets/js/pages/forms_wizard.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    $( "#perfil" ).change(function() {
      if($(this).val() == 2) {
        $("#box_legal_situation_id").hide();
        $("#box_district_id").hide();
        $("#pais").show();

      } else {
        $("#box_legal_situation_id").show();
        $("#box_district_id").show();
        $("#pais").hide();

      }
    });

      @if(old('perfil') == 2)
        $("#box_legal_situation_id").hide();
        $("#box_district_id").hide();
        $("#pais").show();
      @endif

  });
</script>
</body>

</html>
