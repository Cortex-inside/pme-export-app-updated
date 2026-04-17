<!-- Links -->
<ul class="sidenav-inner py-1">
    <li class="sidenav-item {{(Route::is("dashboard"))? "active": ""}}" data-toggle="tooltip"
        data-placement="right" title="@lang('sistema.menu.Dashboard')" >
        <a class="sidenav-link" href="{{route("dashboard")}}">
            <i class="sidenav-icon fas fa-home"></i>
            <div>@lang('sistema.menu.Dashboard')</div>
        </a>
    </li>
        <li class="sidenav-divider mb-1"></li>

        <li class="sidenav-item  @if(Route::is("companyCertificates*") ) open @endif">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-book"></i>
                <div>@lang('sistema.menu.Certificates')</div>
            </a>

            <ul class="sidenav-menu">
                <li class="sidenav-item {{(Route::is("companyCertificates.index"))? "active": ""}}" data-toggle="tooltip"
                    data-placement="right" title="@lang('sistema.menu_admin.todos_pedidos')" >
                    <a class="sidenav-link" href="{{route("companyCertificates.index")}}"><div>@lang('sistema.menu_admin.todos')</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.pending"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="@lang('sistema.menu_admin.pedidos_pendentes')" >
                    <a class="sidenav-link" href="{{route("companyCertificates.pending")}}"><div>@lang('sistema.menu_admin.pendentes')</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.approved"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="@lang('sistema.menu_admin.pedidos_aprovados')" >
                    <a class="sidenav-link" href="{{route("companyCertificates.approved")}}"><div>@lang('sistema.menu_admin.aprovados')</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.disapproved"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="@lang('sistema.menu_admin.pedidos_reprovados')" >
                    <a class="sidenav-link" href="{{route("companyCertificates.disapproved")}}"><div>@lang('sistema.menu_admin.reprovados')</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.inProgress"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="@lang('sistema.menu_admin.em_andamento')" >
                    <a class="sidenav-link" href="{{route("companyCertificates.inProgress")}}"><div>@lang('sistema.menu_admin.em_andamento')</div></a>
                </li>
            </ul>
        </li>

        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-item  @if(Route::is("companies*") ) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  lnr lnr-apartment"></i>
            <div>@lang('sistema.menu.Companies')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("companies.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.index")}}"><div>@lang('sistema.menu_admin.todas')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("companies.pending"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.pending")}}"><div>@lang('sistema.menu_admin.pendentes')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("companies.approved"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.approved")}}"><div>@lang('sistema.menu_admin.aprovadas')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("companies.disapproved"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.disapproved")}}"><div>@lang('sistema.menu_admin.reprovadas')</div></a>
            </li>
        </ul>
    </li>
    <li class="sidenav-divider mb-1"></li>

    <li class="sidenav-item   @if(Request::is('exchange/requests-todos')) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-inbox"></i>
            <div> @lang('sistema.menu.Requests')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("exchange.requests-todos"))? "active": ""}}"
                data-toggle="tooltip"
                data-placement="right" title="@lang('sistema.menu_admin.pedidos_todos')" >
                <a class="sidenav-link" href="{{route("exchange.requests-todos")}}"><div><i class=" feather icon-download "></i>
                        @lang('sistema.menu_admin.todos')</div></a>
            </li>

        </ul>
    </li>
    <li class="sidenav-divider mb-1"></li>
    <!-- EXEMPLO DE MENU MULTIPLO -->
    <li class="sidenav-item {{ (Request::is('products*') OR Request::is('productCategories*')) ? 'open' : '' }}">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon fas fa-box"></i>
            <div>@lang('sistema.menu.Products')</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item {{ Route::is('products.create') ? 'active' : '' }}"><a class="sidenav-link" href="{!! route('products.create') !!}">@lang('sistema.menu_admin.cadastrar_produto')</a></li>
            <li class="sidenav-item {{ Route::is('products.index') ? 'active' : '' }}"><a class="sidenav-link" href="{!! route('products.index') !!}">@lang('sistema.menu.Products')</a></li>
            <li class="sidenav-item {{ Route::is('productCategories.index') ? 'active' : '' }}"><a class="sidenav-link" href="{!! route('productCategories.index') !!}">@lang('sistema.menu_admin.categorias')</a></li>

        </ul>
    </li>
    <li class="sidenav-divider mb-1"></li>

    <li class="sidenav-item  @if(Route::is("certificates*") OR  Route::is("caes*") OR  Route::is("districts*") OR  Route::is("provinces*") OR  Route::is("requirements*") OR  Route::is("departments*") OR  Route::is("roles*") OR
      Route::is("permissions*") OR
        Route::is
    ("certificateCategories*")) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  lnr lnr-sync"></i>
            <div>@lang('sistema.menu.Settings')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("certificates.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("certificates.index")}}"><div>@lang('sistema.menu_admin.certificados')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("certificateCategories.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("certificateCategories.index")}}"><div>@lang('sistema.menu_admin.certificado_categoria')</div></a>
            </li>
            <li class="sidenav-item {{(Route::is("requirements.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("requirements.index")}}"><div>@lang('sistema.menu_admin.exigencias')</div></a>
            </li>


            <li class="sidenav-divider mb-1"></li>

            <li class="sidenav-item {{(Route::is("departments.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Departamentos" >
                <a class="sidenav-link" href="{{route("departments.index")}}"><div>@lang('sistema.menu_admin.departamentos')</div></a>
            </li>


            <li class="sidenav-item {{(Route::is("provinces.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Províncias" >
                <a class="sidenav-link" href="{{route("provinces.index")}}"><div>@lang('sistema.menu_admin.provincias')</div></a>
            </li>

            <li class="sidenav-item {{(Route::is("districts.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Distritos" >
                <a class="sidenav-link" href="{{route("districts.index")}}"><div>@lang('sistema.menu_admin.distritos')</div></a>
            </li>


            <li class="sidenav-item {{(Route::is("caes.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="caes" >
                <a class="sidenav-link" href="{{route("caes.index")}}"><div>CAES</div></a>
            </li>

        </ul>
    </li>

    <li class="sidenav-divider mb-1"></li>


    <li class="sidenav-item  @if(Route::is("users*")) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  lnr lnr-users"></i>
            <div>@lang('sistema.menu.Users')</div>
        </a>

        <ul class="sidenav-menu">
            <li class="sidenav-item {{(Route::is("users.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("users.index")}}"><div>@lang('sistema.menu_admin.usuarios')</div></a>
            </li>

            <li class="sidenav-item {{(Route::is("users.indexEmpresa"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("users.indexEmpresa")}}"><div>@lang('sistema.menu_admin.usuarios_empresa')</div></a>
            </li>

            <li class="sidenav-item {{(Route::is("roles.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("roles.index")}}"><div>@lang('sistema.menu_admin.grupos')</div></a>
            </li>

        </ul>
    </li>
</ul>


{{--<li  data-widget="tree" class="  {{ Request::is('admin/requirements*') || Request::is('admin/certificateCategories*') || Request::is('admin/certificates*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-file"></i> <span>Certificados</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Request::is('admin/certificates*') ? 'active' : '' }}"><a href="{!! route('certificates.index') !!}">Certificados</a></li>--}}
        {{--<li class="{{ Request::is('admin/certificateCategories*') ? 'active' : '' }}"><a href="{!! route('certificateCategories.index') !!}">@lang('sistema.menu_admin.categorias')</a></li>--}}
        {{--<li class="{{ Request::is('admin/requirements*') ? 'active' : '' }}"><a href="{!! route('requirements.index') !!}">Exigencias</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--<!-- EXEMPLO DE MENU MULTIPLO -->--}}
{{--<li  data-widget="tree" class=" {{ (Request::is('products*') OR Request::is('productCategories*')) ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-product-hunt"></i> <span>Produtos</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Route::is('products.create') ? 'active' : '' }}"><a href="{!! route('products.create') !!}">Cadastrar produto <span class="label label-success">new</span></a></li>--}}
        {{--<li class="{{ Route::is('products.index') ? 'active' : '' }}"><a href="{!! route('products.index') !!}">@lang('sistema.menu.Products')</a></li>--}}
        {{--<li class="{{ Route::is('productCategories.index') ? 'active' : '' }}"><a href="{!! route('productCategories.index') !!}">@lang('sistema.menu_admin.categorias')</a></li>--}}

    {{--</ul>--}}
{{--</li>--}}

{{--<!-- EXEMPLO DE MENU MULTIPLO -->--}}
{{--<li data-widget="tree" class="  {{ Request::is('exchange/requests*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-arrows-h"></i> <span>Pedidos</span>--}}
        {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu">--}}
        {{--<li class="{{ Route::is('exchange.requests-todos') ? 'active' : '' }}"><a href="{!! route('exchange.requests-todos') !!}">Todos</a></li>--}}
        {{--<li class="{{ Route::is('exchange.requests-fechados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-fechados') !!}">Fechados</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}

{{--<li>--}}


{{--<li class="{{ Request::is('admin/departments*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('departments.index') !!}"><i class="fa fa-globe"></i><span>Departamentos</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('admin/provinces*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('provinces.index') !!}"><i class="fa fa-globe"></i><span>Provincias</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('admin/districts*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('districts.index') !!}"><i class="fa fa-globe"></i><span>Distritos</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('admin/caes*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('caes.index') !!}"><i class="fa fa-file"></i><span>CAE</span></a>--}}
{{--</li>--}}


{{--<!-- EXEMPLO DE MENU MULTIPLO -->--}}
{{--<li  data-widget="tree" class="  {{ Request::is('admin/users*') || Request::is('admin/group_users*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-users"></i> <span>Usuários</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Route::is('users*') ? 'active' : '' }}"><a href="{!! route('users.index') !!}">Usuários</a></li>--}}
        {{--<li class="{{ Route::is('users*') ? 'active' : '' }}"><a href="{!! route('users.indexEmpresa') !!}">Usuários Empresas</a></li>--}}
        {{--@hasrole('superuser')<li class="{{ Route::is('group_users*') ? 'active' : '' }}"><a href="{!! route('group_users.index') !!}">Grupos de Acesso</a></li>@endhasrole--}}
    {{--</ul>--}}
{{--</li>--}}
{{--@hasrole('superuser')--}}
{{--<li  data-widget="tree" class=" {{ Request::is('admin/roles*') || Request::is('admin/permissions*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-key"></i> <span>Administrativo</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Request::is('admin/permissions*') ? 'active' : '' }}"><a href="{!! route('permissions.index') !!}">Permissões</a></li>--}}
        {{--<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{!! route('roles.index') !!}">Regras</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--@endhasrole--}}
{{--<li>--}}
    {{--<a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
        {{--<i class="fa fa-sign-out"></i> <span>Sair</span>--}}
    {{--</a>--}}
    {{--<form id="logout-form" action="/logout" method="POST" style="display: none;">--}}
        {{--@csrf--}}
    {{--</form>--}}
{{--</li>--}}
