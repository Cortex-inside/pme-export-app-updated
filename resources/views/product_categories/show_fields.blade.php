<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $productCategory->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Imagem da Categoria:', ['class'=>'form-label']) !!}
    <div class="flex-grow-1 container-p-y">
        <div id="gallery-lightbox" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <div id="gallery-thumbnails" class="row form-row">
            <div class="gallery-sizer col-sm-6 col-md-6 col-xl-3 position-absolute"></div>
                <div class="gallery-thumbnail col-sm-6 col-md-6 col-xl-3 mb-2" data-tag="nature">
                    <a href="{!! $productCategory->photo_url !!}" class="img-thumbnail img-thumbnail-zoom-in">
                        <span class="img-thumbnail-overlay bg-dark opacity-25"></span>
                        <span class="img-thumbnail-content display-4 text-white">
                                <i class="ion ion-ios-search"></i>
                            </span>
                        <img src="{!! $productCategory->photo_url !!}" class="img-fluid" alt="images">
                    </a>
                </div>
        </div>

    </div>


</div>

