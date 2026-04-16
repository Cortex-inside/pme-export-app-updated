
<div class="form-row">
    <!-- Name Field -->
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
        <p>{!! $company->name !!}</p>
    </div>

    <!-- Status Field -->
    <div class="form-group col-md-6">
        {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
        <p>{!! $company->status() !!}</p>
    </div>
</div>

<div class="form-row">

    <!-- Legal Situation Id Field -->
    <div class="form-group col-md-6 ">
        {!! Form::label('legal_situation_id', 'Situação legal:', ['class'=>'form-label']) !!}
        <p>{!! $company->legalSituation->name !!}</p>
    </div>

    <!-- District Id Field -->
    <div class="form-group col-md-6">
        {!! Form::label('district_id', 'Distrito:', ['class'=>'form-label']) !!}
        <p>{!! $company->district->name !!}</p>
    </div>
</div>
<div class="form-row">

    <!-- Initials Field -->
    <div class="form-group col-md-6">
        {!! Form::label('initials', 'Iniciais:', ['class'=>'form-label']) !!}
        <p>{!! $company->initials !!}</p>
    </div>

    <!-- Address Field -->
    <div class="form-group col-md-6">
        {!! Form::label('address', 'Endereço:', ['class'=>'form-label']) !!}
        <p>{!! $company->address !!}</p>
    </div>
</div>
<div class="form-row">

    <!-- Number Field -->
    <div class="form-group col-md-6">
        {!! Form::label('number', 'Numero:', ['class'=>'form-label']) !!}
        <p>{!! $company->number !!}</p>
    </div>

    <!-- Zipcode Field -->
    <div class="form-group col-md-6">
        {!! Form::label('zipcode', 'Caixa postal:', ['class'=>'form-label']) !!}
        <p>{!! $company->zipcode !!}</p>
    </div>
</div>
<div class="form-row">

    <!-- Website Field -->
    <div class="form-group col-md-12">
        {!! Form::label('website', 'Website:', ['class'=>'form-label']) !!}
        <p>{!! $company->website !!}</p>
    </div>


</div>

<div class="form-row">
    <!-- Nuit Field -->
    <div class="form-group col-md-6">
        {!! Form::label('nuit', 'NUIT:', ['class'=>'form-label']) !!}
        <p>{!! $company->nuit !!}</p>
    </div>
    <!-- Nuit Doc Field -->
    <div class="form-group  col-md-6">
        {!! Form::label('nuit_doc', 'NUIT Documento:', ['class'=>'form-label']) !!}
        @if($company->nuit_doc)
        <p><a class="btn btn-primary" href="{{$company->nuit_doc}}" target="_blank"><i class="fa fa-file"></i> Visualizar documento</a></p>
            @else
            <p>Nenhum documento cadastrado</p>
        @endif
    </div>

</div>

<div class="form-row">

    <!-- Alvara Field -->
    <div class="form-group col-md-6">
        {!! Form::label('alvara', 'Alvara:', ['class'=>'form-label']) !!}
        <p>{!! $company->alvara !!}</p>
    </div>
    <!-- Alvara Doc Field -->
    <div class="form-group  col-md-6">
        {!! Form::label('alvara_doc', 'Alvara Documento:', ['class'=>'form-label']) !!}
        @if($company->alvara_doc)
        <p><a class="btn btn-primary" href="{{$company->alvara_doc}}" target="_blank"><i class="fa fa-file"></i> Visualizar documento</a></p>
        @else
            <p>Nenhum documento cadastrado</p>
        @endif
    </div>

</div>

<div class="form-row">
    <!-- Initial Investment Field -->
    <div class="form-group  col-md-6">
        {!! Form::label('initial_investment', 'Investimento inicial:', ['class'=>'form-label']) !!}
        <p>{!! $company->initial_investment !!}</p>
    </div>
    <!-- Business Volume Field -->
    <div class="form-group col-md-6">
        {!! Form::label('business_volume', 'Volume do negocio:', ['class'=>'form-label']) !!}
        <p>{!! $company->business_volume() !!}</p>
    </div>
</div>
<div class="form-row">

    <!-- Number Of Workers H Field -->
    <div class="form-group  col-md-6">
        {!! Form::label('number_of_workers_h', 'Numero de trabalhadores - homens:', ['class'=>'form-label']) !!}
        <p>{!! $company->number_of_workers_h !!}</p>
    </div>

    <!-- Number Of Workers M Field -->
    <div class="form-group col-md-6">
        {!! Form::label('number_of_workers_m', 'Numero de trabalhadores - mulheres:', ['class'=>'form-label']) !!}
        <p>{!! $company->number_of_workers_m !!}</p>
    </div>
</div>

<div class="form-row">

    <!-- Created At Field -->
    <div class="form-group col-md-6">
        {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
        <p>{!! \Illuminate\Support\Carbon::parse($company->created_at)->format('d/m/Y H:i') !!}</p>
    </div>
    @if($company->status == 2)
    <!-- Created At Field -->
    <div class="form-group col-md-6">
        {!! Form::label('created_at', 'Motivo de reprovação:', ['class'=>'form-label']) !!}
        <p>{!! $company->motive_disapprove !!}</p>
    </div>
    @endif
</div>


