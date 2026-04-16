<!-- Description Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Certificate Category Id Field -->
<div class="form-group {{ $errors->has('certificate_category_id') ? ' has-error' : '' }}">
    <label for="certificate_category_id" class="form-label">Categoria</label>
    <div>
        <select class="custom-select" style="width: 100%;" id="certificate_category_id" name="certificate_category_id" required data-placeholder="Categoria">
            <option></option>
            @forelse($listCategories as $category)
                <option value="{{$category->id}}" {{(old('certificate_category_id')==$category->id || (isset($certificate) && $certificate->certificate_category_id == $category->id)?"selected":"")}}>{{$category->name}}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Descrição:', ['class'=>'form-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'required','placeholder'=>'Descrição']) !!}
</div>

<div class="form-row">
    <div class="form-group col-sm-6 {{ $errors->has('requirements') ? ' has-error' : '' }}">
        <label for="requirements" class="form-label">Exigencias</label>
        <div>
            <select class="custom-select " style="width: 100%;" id="requirements" name="requirements[]" required
                    data-placeholder="Exigencias" >
                <option></option>
                @forelse($listRequirements as $requirement)
                    <option value="{{$requirement->id}}" {{((isset($selectedsRequirements) && in_array($requirement->id,$selectedsRequirements))?"selected":"")}}>{{$requirement->name}}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="clearfix"></div>

    </div>
    <!-- Duration Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('ini_date', 'Data de Início:', ['class'=>'form-label']) !!}
        {!! Form::date('ini_date', \Carbon\Carbon::parse($certificate->ini_date), ['class' => 'form-control', 'required','placeholder'=>'Data de Início:']) !!}
    </div>
    <div class="form-group col-sm-2">
        {!! Form::label('end_date', 'Data de Fim:', ['class'=>'form-label']) !!}
        {!! Form::date('end_date', \Carbon\Carbon::parse($certificate->end_date), ['class' => 'form-control', 'required', 'required','placeholder'=>'Data de Fim:']) !!}
    </div>
    <!-- Duration Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('duration', 'Duração horas:', ['class'=>'form-label']) !!}
        {!! Form::text('duration', null, ['class' => 'form-control', 'required','placeholder'=>'Duração horas:']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('address', 'Local de execução:', ['class'=>'form-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required','placeholder'=>'Local de execução:']) !!}
</div>
<div class="form-row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Status</label>
            <select class="form-control select2" id="status" name="status" required data-placeholder="Selecione um status"
                    style="width: 100%;">
                <option value=""></option>
                <option value="1" {{(old('status')== 1  || (isset($certificate) && $certificate->status == 1) ? "selected":"")}}>Ativada</option>
                <option value="2" {{(old('status')== 2  || (isset($certificate) && $certificate->status == 2) ? "selected":"")}}>Desativada</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Departamento</label>
            <select class="form-control select2" id="department_id" name="department_id" required data-placeholder="Departamento"
                    style="width: 100%;">
                <option value=""></option>
                @forelse($listDepartments as $department)
                    <option value="{{$department->id}}" {{(old('department_id')==$department->id || (isset($certificate) && $certificate->department_id == $department->id)?"selected":"")}}>{{$department->name}}</option>
                @empty
                @endforelse
            </select>
        </div>
        <!-- /.form-group -->
    </div>
</div>

