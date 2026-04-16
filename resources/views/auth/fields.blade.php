<h3 class="login-box-msg">Informações da localidade da empresa</h3>
<!-- Name Field -->
<input type="hidden" name="photo" id="photo" value="">

<div class="form-group col-sm-12">
    <div class="form-group col-sm-2">
        <a data-toggle="modal" data-target="#fotoModal" href="#"><img id="fotoVisualizar" width="45%" src="/img/logo-icon.png" alt="Logo" class="img-thumbnail"></a>
    </div>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('zipcode', 'Caixa postal:') !!}
    {!! Form::text('zipcode', null, ['class' => 'form-control zipcode', 'placeholder' => '00000-000']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('address', 'Endereço:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Endereço']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('number', 'Número:') !!}
    {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número']) !!}
</div>

<h3 class="login-box-msg">Informações gerais empresa</h3>

<div class="form-group col-sm-12">
    {!! Form::label('initials', 'Iniciais da empresa:') !!}
    {!! Form::text('initials', null, ['class' => 'form-control', 'placeholder' => 'Iniciais da empresa', 'required']) !!}
</div>
<div class="row col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('nuit', 'Número NUIT:') !!}
        {!! Form::text('nuit', null, ['class' => 'form-control', 'placeholder' => 'Número do NUIT', 'required']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('nuit_doc', 'NUIT:') !!}
        {!! Form::file('nuit_doc', null, ['class' => 'form-control nuitDoc', 'required']) !!}
    </div>

</div>
<div class="row col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('alvara', 'Número Alvara:') !!}
        {!! Form::text('alvara', null, ['class' => 'form-control', 'placeholder' => 'Alvara', 'required']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('alvara_doc', 'Alvara:') !!}
        {!! Form::file('alvara_doc', null, ['class' => 'form-control alvaraDoc', 'required']) !!}
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'http://www.exemple.com']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('initial_investment', 'Investimento inicial:') !!}
    {!! Form::text('initial_investment', null, ['class' => 'form-control', 'placeholder' => 'Investimento inicial']) !!}
</div>

<div class="form-group col-sm-12 {{ $errors->has('business_volume') ? ' has-error' : '' }}">
    <label for="business_volume">Volume do negócio:</label>
    <div>
        <select class="form-control select2" id="business_volume" name="business_volume"  data-placeholder="Volume do negócio">
            <option></option>
            <option value="1">0 » 1.200.000.000 MT Micro</option>
            <option value="2">1.200.000.000 MT » 14.700.000.000 MT Pequena</option>
            <option value="3">14.700.000.000 MT » 29.970.000.000 MT Média</option>
        </select>
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('number_of_workers_h', 'Número de trabalhadores(Homens):') !!}
    {!! Form::number('number_of_workers_h', null, ['class' => 'form-control', 'placeholder' => 'Número de trabalhadores(Homens)']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('number_of_workers_m', 'Número de trabalhadores(Mulheres):') !!}
    {!! Form::number('number_of_workers_m', null, ['class' => 'form-control', 'placeholder' => 'Número de trabalhadores(Mulheres)']) !!}
</div>

<div class="form-group col-sm-12 {{ $errors->has('caes') ? ' has-error' : '' }}">
    <label for="caes">CAE</label>
    <div>
        <select class="form-control select2" id="caes" name="caes[]" required data-placeholder="CAE" multiple>
            <option></option>
            @forelse($listCAEs as $cae)
                <option value="{{$cae->id}}">{{$cae->description}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>

<div class="phonePrincipal col-md-6">
    <div class="phoneBox">
        <div class="form-group col-md-11">
            <label for="phones">Telefone</label>
            <input type="text" class="form-control phone" placeholder="(00) 0000-0000" id="phones" name="phones[]" placeholder="Telefone" required>
        </div>
    </div>
    <div class="col-md-11 text-center">
        <a href="javascript:void(0);" class="btn btn-info" id="addPhone"><i class="fa fa-plus"></i> Adicionar telefone</a>
    </div>
</div>

<div class="emailPrincipal col-md-6">
    <div class="emailBox">
        <div class="form-group  col-md-11">
            <label for="emails">E-mail</label>
            <input type="email" class="form-control" id="emails" name="emails[]" placeholder="E-mail" required>
        </div>
    </div>
    <div class="col-md-11 text-center">
        <a href="javascript:void(0);" class="btn btn-info" id="addEmail"><i class="fa fa-plus"></i> Adicionar e-mail</a>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary enviaCadastro']) !!}
</div>
