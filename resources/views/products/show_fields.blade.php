
<!-- Product Category Id Field -->
<div class="form-group">
    {!! Form::label('product_category_id', 'Nome Categoria:', ['class'=>'form-label']) !!}
    <p>{!! $product->productCategory->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $product->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    <p>{!! $product->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! $product->created_at !!}</p>
</div>

