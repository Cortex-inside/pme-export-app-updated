<!-- Province Id Field -->
<div class="form-group">
    {!! Form::label('province_id', 'Província:', ['class'=>'form-label']) !!}
    <p>{!! $district->province->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $district->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! $district->created_at !!}</p>
</div>

