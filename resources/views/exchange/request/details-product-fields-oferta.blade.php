<div class="form-group ">
    <label for="occurrence_os_name" class="form-label">Produto:</label>
    <div class="input-static ">{{$announcement->product->name}}</div>
</div>
<div class="form-group ">
    <label for="occurrence_os_name" class="form-label">Quantidade:</label>
    <div class="input-static ">{{$announcement->amount}} {{$announcement->unidadeMedidaOuPeso()}}</div>
</div>
<div class="form-group " class="form-label">
    <label for="occurrence_os_name">Preço:</label>
    <div class="input-static ">{{coin($announcement->coin)}} {{$announcement->price}}</div>
</div>

