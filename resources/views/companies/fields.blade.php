<!-- Uuid Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('uuid', 'Uuid:') !!}--}}
    {{--{!! Form::text('uuid', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nome da empresa:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', companyStatusList(),$company->status,['class' => 'form-control']) !!}
</div>

<!-- Legal Situation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('legal_situation_id', 'Situação Legal:') !!}
    {!! Form::select('legal_situation_id', legalSituation(),$company->legal_situation_id, ['class' => 'form-control']) !!}
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'Distrito:') !!}
    {!! Form::select('district_id', districts(),$company->district_id, ['class' => 'form-control']) !!}
</div>

<!-- Initials Field -->
<div class="form-group col-sm-6">
    {!! Form::label('initials', 'Iniciais da empresa:') !!}
    {!! Form::text('initials', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Endereço:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Número:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Locality Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('locality', 'Locality:') !!}--}}
    {{--{!! Form::text('locality', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Latitude Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('latitude', 'Latitude:') !!}--}}
    {{--{!! Form::text('latitude', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Longitude Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('longitude', 'Longitude:') !!}--}}
    {{--{!! Form::text('longitude', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Country Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('country', 'Country:') !!}--}}
    {{--{!! Form::number('country', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Zipcode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zipcode', 'Caixa postal:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Nuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nuit', 'Número NUIT:') !!}
    {!! Form::number('nuit', null, ['class' => 'form-control']) !!}
</div>

<!-- Nuit Doc Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('nuit_doc', 'Nuit Doc:') !!}--}}
    {{--{!! Form::text('nuit_doc', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Alvara Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alvara', 'Número Alvara:') !!}
    {!! Form::number('alvara', null, ['class' => 'form-control']) !!}
</div>

<!-- Alvara Doc Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('alvara_doc', 'Alvara Doc:') !!}--}}
    {{--{!! Form::text('alvara_doc', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Initial Investment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('initial_investment', 'Investimento inicial:') !!}
    {!! Form::text('initial_investment', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_volume', 'Business Volume:') !!}
    {!! Form::select('business_volume', businessVolumeList(),$company->business_volume, ['class' => 'form-control']) !!}
</div>

<!-- Number Of Workers H Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_workers_h', 'Número de trabalhadores(Homens):') !!}
    {!! Form::number('number_of_workers_h', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Of Workers M Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_of_workers_m', 'Número de trabalhadores(Mulheres):') !!}
    {!! Form::number('number_of_workers_m', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('companies.index') !!}" class="btn btn-default">Cancel</a>
</div>
