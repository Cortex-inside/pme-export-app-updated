<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Empresa:', ['class'=>'form-label']) !!}
    <div class="">{!! $companyPartner->company->name !!}</div>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class'=>'form-label']) !!}
    <div class="">{!! $companyPartner->name !!}</div>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <div class="">{!! $companyPartner->createdAtFormat() !!}</div>
</div>
