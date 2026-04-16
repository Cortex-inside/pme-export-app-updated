<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Type Field -->
<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
    <label for="type" class="form-label">Tipo:</label>
    <div>
        <select class="form-control select2" id="type" name="type" required data-placeholder="Tipo">
            <option></option>
            <option value="1" {{(old('type')== 1  || (isset($requirement) && $requirement->type == 1) ? "selected":"")}}>Arquivo</option>
            <option value="2" {{(old('type')== 2  || (isset($requirement) && $requirement->type == 2) ? "selected":"")}}>Texto</option>
        </select>
    </div>
</div>
