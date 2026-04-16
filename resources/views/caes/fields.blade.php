<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Codigo:', ['class'=>'form-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('designation', 'Designação:', ['class'=>'form-label']) !!}
    {!! Form::text('designation', null, ['class' => 'form-control','required']) !!}
</div>

<div class="form-row">
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('caes.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>