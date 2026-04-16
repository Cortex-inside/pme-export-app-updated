<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Empresa:', ['class'=>'form-label']) !!}
    <div class="">{!! $companyRepresentative->company->name !!}</div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class'=>'form-label']) !!}
    <div class="">{!! $companyRepresentative->name !!}</div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <div class="">{!! $companyRepresentative->createdAtFormat() !!}</div>
</div>
