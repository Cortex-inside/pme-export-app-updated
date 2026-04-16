<!-- Name Field -->
<div class="form-group ">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Product Category Id Field -->
<div class="form-group {{ $errors->has('product_category_id') ? ' has-error' : '' }}">
    <label for="product_category_id" class="form-control">Categoria</label>
    <div>
        <select class="form-control select2" id="product_category_id" name="product_category_id" required data-placeholder="Categoria">
            <option>Escolha uma categoria</option>
            @forelse($listProductCategory as $category)
                <option value="{{$category->id}}" {{(old('product_category_id')==$category->id || (isset($product) && $product->product_category_id == $category->id)?"selected":"")}}>{{$category->name}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','required']) !!}
</div>


<div class="form-row">
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('products.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>

