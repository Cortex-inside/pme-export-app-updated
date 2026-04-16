<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('photo', 'Foto:', ['class'=>'form-label']) !!}
    {!! Form::file('photo', ['class' => 'form-control','accept'=>'image/*']) !!}
</div>

<div class="form-row">
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('productCategories.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>

