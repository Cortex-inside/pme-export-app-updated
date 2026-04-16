@extends('layouts.app')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/bower_components/Croppie/croppie.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css" />
@endsection
@section('content')

    <input type="hidden" id="ds_foto" name="ds_foto">
    <div class="modal fade " id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModal">
        <div class="modal-dialog modal-lg foto" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Seu Logo</h4>
                </div>
                <div class="modal-body" style="text-align: center; height: 450px">
                    <div class="videoBox">
                        <div class="row" id="imageUploadAction">
                            <div class="col-md-6 col-lg-offset-3">
                                <img class="img-responsive " style="cursor: pointer" id="OpenImgUpload" src="/img/ImportingUsers-03.png" alt="Add photo">
                            </div>
                        </div>
                        <div class="col-1-2">
                            <div class="upload-demo-wrap img-thumbnail">
                                <div id="upload-demo"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" class="fileUpload form-c" id="fileUpload" accept='image/*' />
                        </div>
                        <div class="col-md-6">
                            <button id="uploadImageBtn" class="btn btn-default" style="display: none" type="button"><i class="glyphicon glyphicon-upload"></i> Crop photo</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="content-header">
        <h1>
            Complemento de cadastro
        </h1>
        @if($company->status == 4)
            <br>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Cadastro Reprovado!</h4>
                <p><strong>Motivo: </strong>{{$company->motive_disapprove}}</p>
                <hr>
                <p class="mb-0">Corrija as pendencias e envie os dados novamente.</p>
            </div>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'sysCompany.storeComplementRegister', 'files' => true, 'class'=>'form']) !!}

                    @include('auth.fields')

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $(function () {

            $(".select2").select2({
                placeholder: "Selecione os CAEs de sua empresa",
                allowClear: true
            });

            $(document).on("click","#addPhone",function (e) {
                e.preventDefault();
                $('<div class="form-group col-md-11">'+
                    '<label for="phones">Telefone</label>'+
                    '<input type="text" placeholder="(00) 0000-0000" class="form-control phone" id="phones" name="phones[]" placeholder="Telefone">'+
                    '<i class="fa fa-trash-o remove-row-phone" style="position: absolute;right: 0;bottom: 10px;"></i>'+
                    '</div>').appendTo(".phoneBox");

                $('.phone').mask('(00) 0000-0000');
                return false;
            });
            $(document).on("click",".remove-row-phone",function(){
                $(this).parent().remove();
            });

            $(document).on("click","#addEmail",function (e) {
                e.preventDefault();
                $('<div class="form-group col-md-11">'+
                    '<label for="emails">E-mail</label>'+
                    '<input type="email" class="form-control" id="emails" name="emails[]" placeholder="E-mail">'+
                    '<i class="fa fa-trash-o remove-row-email" style="position: absolute;right: 0;bottom: 10px;"></i>'+
                    '</div>').appendTo(".emailBox");

                $('.phone').mask('(00) 0000-0000');
                return false;
            });
            $(document).on("click",".remove-row-email",function(){
                $(this).parent().remove();
            });

            $('.phone').mask('(00) 0000-0000');
            $('.zipcode').mask('00000-000');

            $(document).on("submit",".form",function (e) {
                e.preventDefault();
                var goToSubmit = true;
                var textoRetorno = '';

                if(!$('#nuit_doc').val() || $('#nuit_doc').val() == ''){
                    goToSubmit = false;
                    textoRetorno += 'Upload do NUIT é obrigatório.\n';
                }

                if(!$('#alvara_doc').val() || $('#alvara_doc').val() == ''){
                    goToSubmit = false;
                    textoRetorno += 'Upload do Alvara é obrigatório.\n';
                }

                if(goToSubmit == true){
                    $(this)[0].submit();
                } else {
                    alert(textoRetorno);
                }
            });
        });
    </script>

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