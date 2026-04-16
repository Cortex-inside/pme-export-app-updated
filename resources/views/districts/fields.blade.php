<!-- Name Field -->
<div class="form-group ">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Province Id Field -->
<div class="form-group {{ $errors->has('province_id') ? ' has-error' : '' }}">
    <label for="province_id" class="form-label">Província</label>
    <div>
        <select class="form-control select2" id="province_id" name="province_id" required data-placeholder="Província">
            <option></option>
            @forelse($listProvinces as $province)
                <option value="{{$province->id}}" {{(old('province_id')==$province->id || (isset($district) && $district->province->id == $province->id)?"selected":"")}}>{{$province->name}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group">
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
        <a href="{!! route('provinces.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>