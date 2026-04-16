<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
</div>


<div class="form-row">
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('departments.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>
