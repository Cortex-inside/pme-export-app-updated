<!-- Links -->
<ul class="sidenav-inner py-1">

    <!-- Dashboard -->
    <li class="sidenav-item {{(Route::is("exchange.index"))? "active": ""}}" data-toggle="tooltip"
        data-placement="right" title="@lang('sistema.menu.Dashboard')" >
        <a class="sidenav-link" href="{{route("exchange.index")}}">
            <i class="sidenav-icon fas fa-hand-holding-usd"></i>
            <div>@lang('sistema.menu_empresa.CompraVenda')</div>
        </a>
    </li>

    <li class="sidenav-item  @if(Request::is('sysCompany/announcements*')) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  feather icon-shopping-cart"></i>
            <div>@lang('sistema.menu_empresa.Anuncio')</div>
        </a>

        <ul class="sidenav-menu">
                <li class="sidenav-item {{(Route::is("sysCompany.companyAnnouncements.create"))? "active": ""}}" data-toggle="tooltip"
                    data-placement="right" title="Empresas" >
                    <a class="sidenav-link" href="{{route("sysCompany.companyAnnouncements.create")}}"><div><i
                                    class=" feather icon-plus "></i> @lang('sistema.menu_empresa.Cadastrar')
                        </div></a>
                </li>
                <li class="sidenav-item {{(Route::is("sysCompany.companyAnnouncements.indexByCompany"))? "active": ""}}"
                    data-toggle="tooltip"
                    data-placement="right" title="@lang('sistema.menu_empresa.Anuncio.Listar')" >
                    <a class="sidenav-link" href="{{route("sysCompany.companyAnnouncements.indexByCompany")}}"><div><i
                                    class=" feather icon-list "></i>  @lang('sistema.menu_empresa.Anuncio.Listar')</div></a>
                </li>

        </ul>
    </li>

    <li class="sidenav-item  @if(Request::is('exchange/requests') OR Request::is('exchange/requests-enviados')  OR Request::is('exchange/requests-recebidos')) open
@endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-inbox"></i>
            <div> @lang('sistema.menu_empresa.Pedidos')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("exchange.requests"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.Todos')" >
                <a class="sidenav-link" href="{{route("exchange.requests")}}"><div><i class=" feather
                    icon-list "></i> @lang('sistema.menu_empresa.Todos')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("exchange.requests-enviados"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.Enviados')" >
                <a class="sidenav-link" href="{{route("exchange.requests-enviados")}}"><div><i class=" feather
                icon-upload "></i> @lang('sistema.menu_empresa.Enviados')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("exchange.requests-recebidos"))? "active": ""}}"
                data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.Recebidos')" >
                <a class="sidenav-link" href="{{route("exchange.requests-recebidos")}}"><div><i class=" feather icon-download "></i>
                        @lang('sistema.menu_empresa.Recebidos')</div></a>
            </li>

        </ul>
    </li>


    <li class="sidenav-item  @if(Request::is('sysCompany/certificates*')) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon fas fa-clipboard"></i>
            <div> @lang('sistema.menu_empresa.Certificados')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("sysCompany.certificates.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.Solicitar')" >
                <a class="sidenav-link" href="{{route("sysCompany.certificates.index")}}"><div><i class="fas fa-clipboard-list"></i> @lang('sistema.menu_empresa.Solicitar')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("sysCompany.certificates.myCertificates"))? "active": ""}}"
                data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.MeusCertificados')" >
                <a class="sidenav-link" href="{{route("sysCompany.certificates.myCertificates")}}"><div><i class=" fas fa-clipboard-check "></i>
                        @lang('sistema.menu_empresa.MeusCertificados')</div></a>
            </li>
        </ul>
    </li>

    <li class="sidenav-item  @if(Request::is('sysCompany/company*') OR Route::is('sysCompany.company.users.change_password')) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon fas fa-building"></i>
            <div> @lang('sistema.menu_empresa.MeusDados')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("sysCompany.company.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.AlterarDados')" >
                <a class="sidenav-link" href="{{route("sysCompany.company.index")}}"><div><i class=" fas fa-id-card "></i> @lang('sistema.menu_empresa.AlterarDados')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is('sysCompany.company.users.change_password'))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_empresa.TrocarSenha')" >
                <a class="sidenav-link" href="{{route("sysCompany.company.users.change_password", Auth::user()->uuid)}}"><div><i class=" oi oi-key "></i> @lang('sistema.menu_empresa.TrocarSenha')</div></a>
            </li>
        </ul>
    </li>

    <!-- Dashboard -->
    <li class="sidenav-item" data-toggle="tooltip" data-placement="right" title="@lang('sistema.menu.Dashboard')" >
        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="sidenav-link" >
            <i class="sidenav-icon oi oi-account-logout"></i>
            <div>@lang('sistema.menu_empresa.Sair')</div>
        </a>
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
