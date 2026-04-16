
<div class="form-group">
    {!! Form::label('department_id', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $certificate->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('certificate_category_id', 'Categoria:', ['class'=>'form-label']) !!}
    <p>{!! $certificate->certificateCategory->name !!}</p>
</div>
<div class="form-group">
    {!! Form::label('certificate_category_id', 'Descrição:', ['class'=>'form-label']) !!}
    <p>{!! $certificate->description !!}</p>
</div>

<div class="form-row">

    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Início:', ['class'=>'form-label']) !!}
        <p>{!! $certificate->iniDate() !!}</p>
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Fim:', ['class'=>'form-label']) !!}
        <p>{!! $certificate->endDate() !!}</p>
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('duration', 'Duração:', ['class'=>'form-label']) !!}
        <p>{!! $certificate->duration !!}</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('required', 'Exigência:', ['class'=>'form-label']) !!}
    @if($certificate->requirements->count())
        @foreach($certificate->requirements as $requirement)
        <p>{{$requirement->name}}</p>
        @endforeach
    @endif
</div>

<div class="form-row">
    <div class="form-group col-sm-4">
        {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
        <p>{!! $certificate->status() !!}</p>
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('department_id', 'Departamento:', ['class'=>'form-label']) !!}
        <p>{!! $certificate->department->name !!}</p>
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
        <p>{!! $certificate->createdAt() !!}</p>
    </div>
</div>
