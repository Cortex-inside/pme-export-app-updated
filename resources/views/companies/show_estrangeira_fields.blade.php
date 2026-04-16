

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome:', ['class'=>'form-label']) !!}
    <p>{!! $company->name !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:', ['class'=>'form-label']) !!}
    <p>{!! $company->status() !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:', ['class'=>'form-label']) !!}
    <p>{!! \Illuminate\Support\Carbon::parse($company->created_at)->format('d/m/Y H:i') !!}</p>
</div>
@if($company->status == 2)
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Motivo de reprovação:', ['class'=>'form-label']) !!}
    <p>{!! $company->motive_disapprove !!}</p>
</div>
@endif

