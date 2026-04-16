<div class="form-group ">
    <label for="occurrence_os_name" class="form-label">Produto:</label>
    <div class="input-static ">{{$announcement->company_announcements->product->name}}</div>
</div>
<div class="form-group ">
    <label for="occurrence_os_name" class="form-label">Quantidade:</label>
    <div class="input-static ">{{$announcement->company_announcements->amount}} {{$announcement->company_announcements->unidadeMedidaOuPeso()}}</div>
</div>
<div class="form-group " class="form-label">
    <label for="occurrence_os_name">Preço:</label>
    <div class="input-static ">{{coin($announcement->company_announcements->coin)}}  {{$announcement->company_announcements->price}}</div>
</div>

