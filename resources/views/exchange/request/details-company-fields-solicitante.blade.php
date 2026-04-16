<div class="form-group">
    <label for="os_before" class="form-label">@lang("sistema.Nome")</label>
    <div class="input-static">{{$announcement->company_request->name}}</div>
</div>

<div class="form-group">
    <label for="occurrence_os_name" class="form-label">@lang("sistema.Endereco")</label>
    <div class="input-static">{{$announcement->company_request->address}}</div>
</div>

<div class="form-group">
    <label for="schedule_type" class="form-label">@lang("sistema.TipoEmpresa")</label>
    <div class="input-static">{{nullable($announcement->company_request->typeName())}}</div>
</div>
@if($announcement->company_request->district)
<div class="form-group ">
    <label for="occurrence_os_name" class="form-label">@lang("sistema.Distrito")</label>
    <div class="input-static ">{{$announcement->company_request->district->name}}</div>
</div>
@endif

<div class="form-group">
    <label for="occurrence_os_name" class="form-label">Website</label>
    <div class="input-static ">{{nullable($announcement->company_request->website)}}</div>
</div>