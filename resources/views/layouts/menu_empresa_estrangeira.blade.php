@include('layouts.admin.menu_empresa_estrangeira')
<li class="{{ Route::is('exchange.index') ? 'active' : '' }}"><a href="{!! route('exchange.index') !!}"><i class="fa  fa-bullhorn"></i> <span>@lang('sistema.menu_empresa.Anuncio')</span></a></li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree"  class="  {{ Request::is('sysCompany/announcements*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-product-hunt"></i> <span>@lang('sistema.menu_empresa.Anuncio')</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('sysCompany.companyAnnouncements.create') ? 'active' : '' }}"><a href="{!! route('sysCompany.companyAnnouncements.create') !!}">@lang('sistema.menu_empresa.Cadastrar') <span class="label label-success">new</span></a></li>
        <li class="{{ Route::is('sysCompany.companyAnnouncements.indexByCompany') ? 'active' : '' }}"><a href="{!! route('sysCompany.companyAnnouncements.indexByCompany') !!}">@lang('sistema.menu_empresa.Anuncio.Listar')</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree"  class="   {{ Request::is('exchange.requests*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-arrows-h"></i> <span>@lang('sistema.menu_empresa.Pedidos')</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('exchange.requests-enviados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-enviados') !!}">@lang('sistema.menu_empresa.Enviados')</a></li>
        <li class="{{ Route::is('exchange.requests-recebidos') ? 'active' : '' }}"><a href="{!! route('exchange.requests-recebidos') !!}">@lang('sistema.menu_empresa.Recebidos')</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class="  {{ Request::is('sysCompany/certificates*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-file"></i> <span>@lang('sistema.menu_empresa.Certificados')</span>
        <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
    </a>
    <ul class="treeview-menu menu-open">
            <li class="{{ Route::is('sysCompany.certificates.index') ? 'active' : '' }}"><a href="{!! route('sysCompany.certificates.index') !!}">@lang('sistema.menu_empresa.Solicitar')</a></li>
            <li class="{{ Route::is('sysCompany.certificates.myCertificates') ? 'active' : '' }}"><a href="{!! route('sysCompany.certificates.myCertificates') !!}">@lang('sistema.menu_empresa.MeusCertificados')</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class="">
    <a href="#">
        <i class="fa fa-info-circle"></i> <span>@lang('sistema.menu_empresa.MeusDados')</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
            <li class="{{ Route::is('sysCompany.company.index') ? 'active' : '' }}"><a href="{!! route('sysCompany.company.index') !!}">@lang('sistema.menu_empresa.AlterarDados')</a></li>
            <li class="{{ Route::is('sysCompany.company.users.change_password') ? 'active' : '' }}"><a href="{!! route('sysCompany.company.users.change_password',Auth::user()->uuid) !!}">@lang('sistema.menu_empresa.TrocarSenha')</a></li>
    </ul>
</li>
<li>
    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> <span>@lang('sistema.menu_empresa.Sair')</span>
    </a>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
</li>
