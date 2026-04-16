@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
@endif
@if(Session::has('error'))
    <div class="alert alert-error alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar" style="color: #FFF;"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-alert"></span><em>  {!! session('error') !!}</em></div>
@endif