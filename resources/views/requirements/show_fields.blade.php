<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $requirement->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    <p>{!! $requirement->description !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Tipo:', ['class'=>'form-label']) !!}
    <p>{!! $requirement->type() !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! $requirement->createdAtFormat() !!}</p>
</div>

