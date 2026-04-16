<div class="form-row">
    <div class="form-group col-md-4">
        {!! Form::label('product_id', 'Produto:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->product->name !!}</p>
    </div>

    <!-- Uuid Field -->
    <div class="form-group col-md-4">
        {!! Form::label('product_category_id', 'Categoria:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->product->productCategory->name !!}</p>
    </div>

    <!-- Uuid Field -->
    <div class="form-group col-md-4">
        {!! Form::label('market_type', 'Tipo de mercado:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->marketType() !!}</p>
    </div>
</div>

<div class="form-row">



    <!-- Uuid Field -->
    <div class="form-group  col-md-4">
        {!! Form::label('type_of_exposure', 'Tipo de exposição:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->typeOfExposure() !!}</p>
    </div>
    <!-- Uuid Field -->
    <div class="form-group  col-md-4">
        {!! Form::label('visibility', 'Visibilidade:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->visibility() !!}</p>
    </div>
    <!-- Uuid Field -->
    <div class="form-group  col-md-4">
        {!! Form::label('unit_of_measure_or_weight', 'Unidade de medida ou peso:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->unidadeMedidaOuPeso() !!}</p>
    </div>


</div>


<div class="form-row">

    <!-- Uuid Field -->
    <div class="form-group  col-md-4">
        {!! Form::label('amount', 'Quantidade:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->amount !!}</p>
    </div>
    <!-- Uuid Field -->
    <div class="form-group  col-md-4">
        {!! Form::label('coin', 'Moeda:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->coin() !!}</p>
    </div>

    <!-- Uuid Field -->
    <div class="form-group col-md-4">
        {!! Form::label('price', 'Preço:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->price !!}</p>
    </div>

</div>

<div class="form-row">
    <!-- Uuid Field -->
    <div class="form-group col-md-4">
        {!! Form::label('payment_model', 'Modelo de pagamento:', ['class'=>'form-label']) !!}
        <p>{!! $announcement->paymentModel() !!}</p>
    </div>
</div>


<!-- Companies -->
<div class="form-group">
    {!! Form::label('updated_at', 'Empresas Visibilidade:', ['class'=>'form-label']) !!}
    @if($announcement->announcementsCompanies->count())
        @foreach($announcement->announcementsCompanies as $company)
            <div class="row">
                <div class="col-md-12">{{$company->company->name }}</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-md-12">Nenhuma empresa adicionada.</div>
        </div>
    @endif
</div>


