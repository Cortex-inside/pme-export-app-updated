<div class="form-group">
    <label for="os_before" class="form-label">@lang("sistema.Nome")</label>
    <div class="input-static">{{$announcement->nomeEmpresa()}}</div>
</div>

<div class="form-group">
    <label for="occurrence_os_name" class="form-label">@lang("sistema.Endereco")</label>
    <div class="input-static">{{$announcement->enderecoEmpresa()}}</div>
</div>

<div class="form-group">
    <label for="schedule_type" class="form-label">@lang("sistema.TipoEmpresa")</label>
    <div class="input-static">{{nullable($announcement->tipoEmpresa())}}</div>
</div>
<div class="form-group ">
    <label for="occurrence_os_name" class="form-label">@lang("sistema.Distrito")</label>
    <div class="input-static ">{{$announcement->districtEmpresa()}}</div>
</div>

<div class="form-group">
    <label for="occurrence_os_name" class="form-label">Website</label>
    <div class="input-static ">{{nullable($announcement->websiteEmpresa())}}</div>
</div>