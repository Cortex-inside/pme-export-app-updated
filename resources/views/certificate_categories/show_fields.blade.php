<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class'=>'form-label']) !!}
    <p>{!! $certificateCategory->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    <p>{!! $certificateCategory->description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! $certificateCategory->createdAtFormat() !!}</p>
</div>
