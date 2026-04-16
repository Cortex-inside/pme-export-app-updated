@extends('layouts.admin.index')
@section('header')
    {{--<h4 class="font-weight-bold py-3 mb-0">Layouts and elements</h4>--}}
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("companies.index")}}">Empresa</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/bower_components/Croppie/croppie.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css" />
@endsection
@section('content')

    <div class="card mb-4">
        <h6 class="card-header">Dados da Empresa</h6>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            @include('flash::message')
            @include('companies.company.photo')

            {!! Form::model($company, ['route' => ['companies.update', $company->uuid], 'method' => 'patch']) !!}
                @include('companies.company.fields')
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/prism.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#city_id").on('change', function () {
          $("#estate").val($(this).find(':selected').data('estate'));
        });

        $('#OpenImgUpload').click(function(){ $("#imageUploadAction").hide(); $('#fileUpload').trigger('click'); });

        $("#fileUpload").on('change', function () {

          if (typeof (FileReader) != "undefined") {

            $("#ds_fotoTmp").hide();

            var reader = new FileReader();
            reader.onload = function (e) {
              $('#upload-demo').addClass('ready');
              $uploadCrop.croppie('bind', {
                url: e.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });

              $("#uploadImageBtn").show();
            }
            reader.readAsDataURL($(this)[0].files[0]);

            $uploadCrop = $('#upload-demo').croppie({
              enableExif: true,
              viewport: {
                width: 350,
                height: 350,
                type: 'square'
              },
              boundary: {
                width: 350,
                height: 350
              }
            });
          } else {
            alert("Este navegador nao suporta FileReader.");
          }
        });

        $('#uploadImageBtn').on('click', function (ev) {
          $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
          }).then(function (resp) {
            $("#photo").val(resp);
            $('#fotoModal').modal('toggle');
            $("#fotoVisualizar").attr("src",resp);
            $("#floristForm").submit();

            popupResult({
              src: resp
            });
          });
        });

      });

      $('#fotoModal').on('show.bs.modal', function (event) {
        // demoUpload();
        if($("#photo").val() == "") {
          $("#imageUploadAction").show();
        }
      });
      function popupResult(result) {
        var html;
        if (result.html) {
          html = result.html;
        }
        if (result.src) {
          html = '<img src="' + result.src + '" />';
        }
        $('#upload-demo').html(html);
      }
    </script>
@endsection

