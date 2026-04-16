<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder'=>'Nome']) !!}
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required','placeholder'=>'Descrição']) !!}
</div>

<div class="form-row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('certificateCategories.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>
