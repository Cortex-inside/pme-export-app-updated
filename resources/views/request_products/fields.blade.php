<!-- Request Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('request_id', 'Request Id:') !!}
    {!! Form::number('request_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('requestProducts.index') !!}" class="btn btn-default">Cancel</a>
</div>
