<!-- Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Certificate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('certificate_id', 'Certificate Id:') !!}
    {!! Form::number('certificate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Requirement Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requirement_id', 'Requirement Id:') !!}
    {!! Form::number('requirement_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('certificateRequirements.index') !!}" class="btn btn-default">Cancel</a>
</div>
