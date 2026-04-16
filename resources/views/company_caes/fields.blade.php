<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cae Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cae_id', 'Cae Id:') !!}
    {!! Form::number('cae_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('companyCaes.index') !!}" class="btn btn-default">Cancel</a>
</div>
