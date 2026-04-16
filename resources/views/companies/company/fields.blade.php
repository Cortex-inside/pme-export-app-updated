<input type="hidden" name="photo" id="photo" value="{{$company->photo}}">

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
        <p>{!! $company->name !!}</p>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Status:', ['class'=>'form-label']) !!}
        <p>{!! $company->status() !!}</p>
    </div>
</div>
@if($company->status == 2)
    <div class="form-group">
        {!! Form::label('motive', 'Motivo da reprovação:', ['class'=>'form-label']) !!}
        <p>{!!$company->motive_disapprove !!}</p>
    </div>
@endif

@if($company->type == 1)
    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('Situação legal', 'Situação legal:', ['class'=>'form-label']) !!}
            <p>{!! getLegalSituation($company->legal_situation_id) !!}</p>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('Sigla', 'Sigla:', ['class'=>'form-label']) !!}
            <p>{!! $company->initials !!}</p>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('Endereço', 'Endereço:', ['class'=>'form-label']) !!}
            <p>{!! $company->address. ', '. $company->number !!}</p>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('Codigo postal', 'Codigo postal:', ['class'=>'form-label']) !!}
            {!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('NUIT', 'NUIT:', ['class'=>'form-label']) !!}
            <p>{!! $company->nuit !!}</p>
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('Alvara', 'Alvara:', ['class'=>'form-label']) !!}
            <p>{!! $company->alvara !!}</p>
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('Investimento inicial', 'Investimento inicial:', ['class'=>'form-label']) !!}
            {!! Form::text('initial_investment', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('Volume do negocio', 'Volume do negocio:', ['class'=>'form-label']) !!}
            {!! Form::text('business_volume', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            {!! Form::label('number_of_workers_h', 'Numero de trabalhadores(Homens):') !!}
            {!! Form::text('number_of_workers_h', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('number_of_workers_m', 'Numero de trabalhadores(Mulheres):') !!}
            {!! Form::text('number_of_workers_m', null, ['class' => 'form-control']) !!}
        </div>
    </div>
@endif
<div class="form-row">
    <div class="form-group col-sm-12">
        {!! Form::label('website', 'Website:') !!}
        {!! Form::text('website', null, ['class' => 'form-control']) !!}
    </div>
</div>


<div class="form-group">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
    <a href="{!! route('companies.index') !!}" class="btn btn-default">Cancelar</a>
</div>
