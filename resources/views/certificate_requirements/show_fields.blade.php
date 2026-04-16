<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $certificateRequirement->id !!}</p>
</div>

<!-- Uuid Field -->
<div class="form-group">
    {!! Form::label('uuid', 'Uuid:') !!}
    <p>{!! $certificateRequirement->uuid !!}</p>
</div>

<!-- Certificate Id Field -->
<div class="form-group">
    {!! Form::label('certificate_id', 'Certificate Id:') !!}
    <p>{!! $certificateRequirement->certificate_id !!}</p>
</div>

<!-- Requirement Id Field -->
<div class="form-group">
    {!! Form::label('requirement_id', 'Requirement Id:') !!}
    <p>{!! $certificateRequirement->requirement_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $certificateRequirement->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $certificateRequirement->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $certificateRequirement->deleted_at !!}</p>
</div>

