<li class=""><a href="{!! url('/home') !!}"><i class="fa fa-home"></i> <span>Home</span></a></li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li  data-widget="tree" class=" {{ Request::is('admin/companyCertificates*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-file"></i> <span>Pedidos de certificados</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('companyCertificates.index') ? 'active' : '' }}"><a href="{!! route('companyCertificates.index') !!}">Todos</a></li>
        <li class="{{ Route::is('companyCertificates.pending') ? 'active' : '' }}"><a href="{!! route('companyCertificates.pending') !!}">Pendentes</a></li>
        <li class="{{ Route::is('companyCertificates.approved') ? 'active' : '' }}"><a href="{!! route('companyCertificates.approved') !!}">Aprovados</a></li>
        <li class="{{ Route::is('companyCertificates.disapproved') ? 'active' : '' }}"><a href="{!! route('companyCertificates.disapproved') !!}">Reprovados</a></li>
        <li class="{{ Route::is('companyCertificates.inProgress') ? 'active' : '' }}"><a href="{!! route('companyCertificates.inProgress') !!}">Em andamento</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li  data-widget="tree" class=" {{ Request::is('admin/companies*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-building"></i> <span>Empresas</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('companies.index') ? 'active' : '' }}"><a href="{!! route('companies.index') !!}">Todas</a></li>
        <li class="{{ Route::is('companies.pending') ? 'active' : '' }}"><a href="{!! route('companies.pending') !!}">Pendentes</a></li>
        <li class="{{ Route::is('companies.approved') ? 'active' : '' }}"><a href="{!! route('companies.approved') !!}">Aprovadas</a></li>
{{--        <li class="{{ Route::is('companies.disapproved') ? 'active' : '' }}"><a href="{!! route('companies.disapproved') !!}">Reprovadas</a></li>--}}
    </ul>
</li>
<li  data-widget="tree" class="  {{ Request::is('admin/requirements*') || Request::is('admin/certificateCategories*') || Request::is('admin/certificates*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-file"></i> <span>Certificados</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Request::is('admin/certificates*') ? 'active' : '' }}"><a href="{!! route('certificates.index') !!}">Certificados</a></li>
        <li class="{{ Request::is('admin/certificateCategories*') ? 'active' : '' }}"><a href="{!! route('certificateCategories.index') !!}">Categorias</a></li>
        <li class="{{ Request::is('admin/requirements*') ? 'active' : '' }}"><a href="{!! route('requirements.index') !!}">Exigencias</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li  data-widget="tree" class=" {{ (Request::is('products*') OR Request::is('productCategories*')) ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-product-hunt"></i> <span>Produtos</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('products.create') ? 'active' : '' }}"><a href="{!! route('products.create') !!}">Cadastrar produto <span class="label label-success">new</span></a></li>
        <li class="{{ Route::is('products.index') ? 'active' : '' }}"><a href="{!! route('products.index') !!}">Produtos</a></li>
        <li class="{{ Route::is('productCategories.index') ? 'active' : '' }}"><a href="{!! route('productCategories.index') !!}">Categorias</a></li>

    </ul>
</li>

<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class="  {{ Request::is('exchange/requests*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-arrows-h"></i> <span>Pedidos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('exchange.requests-todos') ? 'active' : '' }}"><a href="{!! route('exchange.requests-todos') !!}">Todos</a></li>
        {{--<li class="{{ Route::is('exchange.requests-fechados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-fechados') !!}">Fechados</a></li>--}}
    </ul>
</li>

<li>


<li class="{{ Request::is('admin/departments*') ? 'active' : '' }}">
    <a href="{!! route('departments.index') !!}"><i class="fa fa-globe"></i><span>Departamentos</span></a>
</li>

<li class="{{ Request::is('admin/provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-globe"></i><span>Provincias</span></a>
</li>

<li class="{{ Request::is('admin/districts*') ? 'active' : '' }}">
    <a href="{!! route('districts.index') !!}"><i class="fa fa-globe"></i><span>Distritos</span></a>
</li>

<li class="{{ Request::is('admin/caes*') ? 'active' : '' }}">
    <a href="{!! route('caes.index') !!}"><i class="fa fa-file"></i><span>CAE</span></a>
</li>


<!-- EXEMPLO DE MENU MULTIPLO -->
<li  data-widget="tree" class="  {{ Request::is('admin/users*') || Request::is('admin/group_users*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Usuários</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('users*') ? 'active' : '' }}"><a href="{!! route('users.index') !!}">Usuários</a></li>
        <li class="{{ Route::is('users*') ? 'active' : '' }}"><a href="{!! route('users.indexEmpresa') !!}">Usuários Empresas</a></li>
        @hasrole('superuser')<li class="{{ Route::is('group_users*') ? 'active' : '' }}"><a href="{!! route('group_users.index') !!}">Grupos de Acesso</a></li>@endhasrole
    </ul>
</li>
@hasrole('superuser')
<li  data-widget="tree" class=" {{ Request::is('admin/roles*') || Request::is('admin/permissions*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-key"></i> <span>Administrativo</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Request::is('admin/permissions*') ? 'active' : '' }}"><a href="{!! route('permissions.index') !!}">Permissões</a></li>
        <li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{!! route('roles.index') !!}">Regras</a></li>
    </ul>
</li>
@endhasrole
<li>
    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> <span>Sair</span>
    </a>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
</li>