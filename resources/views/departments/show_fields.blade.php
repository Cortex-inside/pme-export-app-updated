<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $department->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    <p>{!! $department->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! $department->created_at !!}</p>
</div>

