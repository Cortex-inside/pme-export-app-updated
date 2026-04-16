<!-- Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Certificate Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_certificate_id', 'Company Certificate Id:') !!}
    {!! Form::number('company_certificate_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Requirement Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requirement_id', 'Requirement Id:') !!}
    {!! Form::number('requirement_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Approved Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approved_date', 'Approved Date:') !!}
    {!! Form::date('approved_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Disapproved Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('disapproved_date', 'Disapproved Date:') !!}
    {!! Form::date('disapproved_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documents.index') !!}" class="btn btn-default">Cancel</a>
</div>
