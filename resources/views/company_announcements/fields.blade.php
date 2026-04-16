<!-- Product Category Id Field -->
<style>
    .select2-selection__choice {
        color: #000 !important;
    }
</style>
<div class="form-group {{ $errors->has('product_category_id') ? ' has-error' : '' }}">
    <label for="product_category_id" class="form-label">Selecione uma categoria de produtos</label>
    <div>
        <select class="form-control select2 product_category_id" id="product_category_id" name="product_category_id"
                required data-placeholder="Categoria" required>
            <option></option>
            @forelse($listProductCategory as $category)
                <option value="{{$category->id}}" {{(old('product_category_id')==$category->id?"selected":"")}}>{{$category->name}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>
<div class="allData" style="display: none">

    <div class="form-row">
        <!-- Product Id Field -->
        <div class="form-group col-sm-4 {{ $errors->has('product_id') ? ' has-error' : '' }}">
            <label for="product_id" class="form-label">Produto</label>
            <div>
                <select class="form-control select2 product_id" id="product_id" name="product_id" required
                        data-placeholder="Produto">

                </select>
            </div>
        </div>
        <!-- Market Type Field -->
        <div class="form-group col-sm-4 {{ $errors->has('market_type') ? ' has-error' : '' }}">
            <label for="market_type" class="form-label">Tipo de mercado</label>
            <div>
                <select class="form-control select2 market_type" id="market_type" name="market_type" required="required"
                        data-placeholder="Tipo de mercado">
                    <option></option>
                    <option value="1">Interno</option>
                    <option value="2">Externo</option>
                </select>
            </div>
        </div>

        <!-- Type of exposure Field -->
        <div class="form-group col-sm-4 {{ $errors->has('type_of_exposure') ? ' has-error' : '' }}">
            <label for="type_of_exposure" class="form-label">Tipo de exposição</label>
            <div>
                <select class="form-control  type_of_exposure" id="type_of_exposure" name="type_of_exposure" required
                        data-placeholder="Tipo de exposição">
                    <option></option>
                    <option value="1">Compra</option>
                    {{--<option value="1">Compra fechada</option>--}}
                    {{--<option value="2">Compra fechada sobre período</option>--}}
                    {{--<option value="3">Compra aguardando proposta</option>--}}
                    {{--<option value="4">Compra aguardando proposta sobre período</option>--}}
                    @hasrole('empresa')
                    <option value="5">Venda</option>
                    {{--<option value="5">Venda fechada</option>--}}
                    {{--<option value="6">Venda fechada sobre período</option>--}}
                    {{--<option value="7">Venda aguardando proposta</option>--}}
                    {{--<option value="8">Venda aguardando proposta sobre período</option>--}}
                    @endhasrole
                </select>
            </div>
        </div>
    </div>

    <div class="form-row">
        <!-- Visibility Field -->
        <div class="form-group col-sm-4 {{ $errors->has('visibility') ? ' has-error' : '' }}">
            <label for="visibility" class="form-label">Visibilidade</label>
            <div>
                <select class="form-control select2 visibility" id="visibility" name="visibility" required
                        data-placeholder="Visibilidade">
                    <option></option>
                    <option value="1">Confidencial</option>
                    <option value="2">Visível</option>
                </select>
            </div>
        </div>

        <!-- Unit of measure or weight Field -->
        <div class="form-group col-sm-4 {{ $errors->has('local_entrega') ? ' has-error' : '' }}">
            {!! Form::label('local_entrega', 'Local Entrega:', ['class'=>'form-label']) !!}
            {!! Form::text('local_entrega', null, ['class' => 'form-control','required']) !!}
        </div>
        <!-- Unit of measure or weight Field -->
        <div class="form-group col-sm-4 {{ $errors->has('logistica') ? ' has-error' : '' }}">
            {!! Form::label('logistica', 'Logística:', ['class'=>'form-label']) !!}
            {!! Form::text('logistica', null, ['class' => 'form-control','required']) !!}
        </div>
    </div>


    <div class="form-group" id="listaEmpresa" style="display: none">
        <label for="caes" class="form-label">Empresas</label>
        <div>
            <select class="form-control select_empresas select2 ignore" style="width: 100%" id="company_ids"
                    name="company_ids[]"
                    required data-placeholder="Empresas" multiple>
                <option></option>
                @forelse($companys as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>
    <div class="form-row">
        <!-- Unit of measure or weight Field -->
        <div class="form-group col-sm-4 {{ $errors->has('unit_of_measure_or_weight') ? ' has-error' : '' }}">
            <label for="unit_of_measure_or_weight"  class="form-label">Unidade de medida ou peso</label>
            <div>
                <select class="form-control select2 unit_of_measure_or_weight" id="unit_of_measure_or_weight" name="unit_of_measure_or_weight" required
                        data-placeholder="Unidade de medida ou peso" >
                    <option></option>
                    <option value="1">Granel</option>
                    <option value="2">Quilo</option>
                    <option value="3">Sacas</option>
                    <option value="4">Toneladas</option>
                </select>
            </div>
        </div>
        <!-- Amount Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('amount', 'Quantidade:', ['class'=>'form-label']) !!}
            {!! Form::text('amount', null, ['class' => 'form-control','required']) !!}
        </div>


        <div class="form-group col-sm-4 {{ $errors->has('coin') ? ' has-error' : '' }}">
            <label for="coin"  class="form-label">Moeda</label>
            <div>
                <select class="form-control select2 coin" id="coin" name="coin" required
                        data-placeholder="Moeda">
                    <option></option>
                    <option value="1">Metical:MT</option>
                    <option value="2">Dollar:USD</option>
                    <option value="3">Euro:EUR</option>
                </select>
            </div>
        </div>


    </div>
    <div class="form-row">
        <!-- Price Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('price', 'Preço:', ['class'=>'form-label ', 'id'=>'price']) !!}
            {!! Form::text('price', null, ['class' => 'form-control currency','required']) !!}
        </div>
        <!-- Payment model Field -->
        <div class="form-group col-sm-6 {{ $errors->has('payment_model') ? ' has-error' : '' }}">
            <label for="payment_model"  class="form-label">Modelo de pagamento</label>
            <div>
                <select class="form-control select2 payment_model" id="payment_model" name="payment_model" required
                        data-placeholder="Modelo de pagamento">
                    <option></option>
                    <option value="3">Transferência</option>
                    <option value="1">Dinheiro</option>
                    <option value="2">Cheque</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Payment model Field -->
    <div class="form-group  {{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="payment_model" class="form-label">Observações</label>
        <div>
            <textarea name="description" id="description" class="form-control ignore">{{old('description')}}</textarea>
        </div>
    </div>


    <div class="form-group">
        <label for="caes" class="form-label">Galeria de imagem:</label>
        <div>
            <input type="file" name="imagens[]" multiple class="form-control ignore">
        </div>
        <div class="filenames "></div>
    </div>

    <div class="form-group">
        <label for="caes" class="form-label">Arquivos para anexar:</label>
        <div>
            <input type="file" name="filename[]" multiple class="form-control ignore">
        </div>
        <div class="imagens "></div>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-12">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light', 'id' => 'btnSave']) !!}
            <a href="{!! route('sysCompany.companyAnnouncements.indexByCompany') !!}" class="btn btn-default  pull-right">Cancelar</a>
        </div>
    </div>
</div>

