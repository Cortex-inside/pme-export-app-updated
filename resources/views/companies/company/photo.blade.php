
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
                        <div class="col-md-12" style="text-align: center">
                            <a href="#" class="btn btn-success btn-lg" id="OpenImgUpload">Clique e escolha uma imagem.</a>
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
                    <div class="col-md-12">
                        <input type="file" style="display: none" class="fileUpload form-c" id="fileUpload" accept='image/*' />
                    </div>
                    <div class="col-md-12">
                        <button id="uploadImageBtn" class="btn btn-default" style="display: none" type="button"><i class="glyphicon glyphicon-upload"></i> Recortar Foto</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('sysCompany.photoStore', $company->uuid) }}" method="POST" id="floristForm">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="photo" id="photo" value="{{$company->photo}}">

    <div class="row">
        <div class="form-group col-sm-2">
            <div class="form-group">
                <div>
                    @if($company->photo)
                        <a data-toggle="modal" data-target="#fotoModal" href="#"><img id="fotoVisualizar" width="45%" src="{{$company->photo}}" title="Clique para alterar"  alt="Clique para alterar" class="img-thumbnail"></a>
                    @else
                        <a data-toggle="modal" data-target="#fotoModal" href="#"><img id="fotoVisualizar" width="45%" src="/img/logo-icon.png" title="Clique para alterar"  alt="Clique para alterar" class="img-thumbnail"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
