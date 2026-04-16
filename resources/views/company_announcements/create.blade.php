@extends('layouts.admin.index')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/bower_components/Croppie/croppie.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css" />
    <link rel="stylesheet" href="/assets/libs/select2/select2.css">
    <link rel="stylesheet" href="/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
@endsection
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("sysCompany.companyAnnouncements.indexByCompany")}}">Anúncios</a></li>
            <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Anúncios</h6>
        {!! Form::model($companyAnnouncement,['route' => 'sysCompany.companyAnnouncements.store','id'=>'anuncioPost', 'enctype' => 'multipart/form-data']) !!}
            <div class="card-body">
                @include('adminlte-templates::common.errors')
                @include('company_announcements.fields')
            </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <!-- Libs -->
    <script src="/assets/libs/validate/validate.js"></script>
    <script src="/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Demo -->
    <script src="/js/anuncio/forms_validation.js"></script>
    <script src="/js/anuncio/validate-pt-br.js"></script>

    {{--<script src="/js/jquery.mask.min.js"></script>--}}
    <script src="/js/jquery.maskMoney.min.js" type="text/javascript"></script>

<script>
  $('.currency').maskMoney({prefix:'$ ', allowNegative: false, thousands:',', decimal:'.', affixesStay: false});


  //AJAX E PREENCHIMENTO AUTOMÁTICO DOS DADOS DO USUARIO
  var $product_category_id = $(".product_category_id");

  $product_category_id.change(function (e) {
    $(".allData").hide();
    var category_id = $(this).val();
    console.log("chegou aqui1");
    jQuery.ajax({
      type: 'GET',
      url: '/sysCompany/announcements/getProductsByCategory_ajax/'+category_id,
      success: function( data )
      {
        console.log("chegou aqui");
        console.log(data);

        if(data != ""){
          $(".product_id").empty();
          $(".product_id").append('<option value=""></option>');
          for(var i=0; i < data.length; i++){
            console.log(data[i].name);
            $(".product_id").append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
          }

          $(".allData").show();

        } else {
          alert("Nenhum produto encontrado para essa categoria");
        }
      },
      error: function (data) {
        console.log("deu erro");
        console.log(data);
      }
    });

  });

</script>
<script type="text/javascript">
  $(function() {



    $('input:file').change(function(){
      for(var i = 0 ; i <= this.files.length ; i++){
        var fileName = this.files[i].name;
        $('.filenames').append('<p >' + fileName + '</p>');
      }
    });
    $('#visibility').change(function(){
      if($(this).val() == 1) {
        $("#listaEmpresa").show();
      } else {
        $("#listaEmpresa").hide();

      }
    });

    $(".select_empresas").select2({
      placeholder: "Selecione os CAEs de sua empresa",
      allowClear: true
    });
  });
</script>
@endsection
