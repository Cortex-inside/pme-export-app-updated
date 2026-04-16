<li class=""><a href=""><i class="fa fa-home"></i> <span>Home</span></a></li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li class="treeview {{ Request::is('products*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-product-hunt"></i> <span>Produtos</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('products.create') ? 'active' : '' }}"><a href="{!! route('products.create') !!}">Cadastrar produto <span class="label label-success">new</span></a></li>
        <li class=""><a href="">Meus produtos</a></li>
        <li class="{{ Route::is('products.index') ? 'active' : '' }}"><a href="{!! route('products.index') !!}">Produtos</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-arrows-h"></i> <span>Pedidos</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class=""><a href="">Minhas Compras</a></li>
        <li class=""><a href="">Minhas Vendas</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-file"></i> <span>Certificados</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class=""><a href="">Solicitar certificado <span class="label label-success">new</span></a></li>
        <li class=""><a href="">Meus certificados</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li class="treeview">
    <a href="#">
        <i class="fa fa-info-circle"></i> <span>Meus dados</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class=""><a href="">Alterar dados</a></li>
        <li class=""><a href="">Trocar senha</a></li>
    </ul>
</li>
<li>
    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> <span>Sair</span>
    </a>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
</li>

<li class="{{ Request::is('departments*') ? 'active' : '' }}">
    <a href="{!! route('departments.index') !!}"><i class="fa fa-edit"></i><span>Departments</span></a>
</li>

<li class="{{ Request::is('certificateCategories*') ? 'active' : '' }}">
    <a href="{!! route('certificateCategories.index') !!}"><i class="fa fa-edit"></i><span>Certificate Categories</span></a>
</li>

<li class="{{ Request::is('certificates*') ? 'active' : '' }}">
    <a href="{!! route('certificates.index') !!}"><i class="fa fa-edit"></i><span>Certificates</span></a>
</li>

<li class="{{ Request::is('requirements*') ? 'active' : '' }}">
    <a href="{!! route('requirements.index') !!}"><i class="fa fa-edit"></i><span>Requirements</span></a>
</li>

<li class="{{ Request::is('companyCertificates*') ? 'active' : '' }}">
    <a href="{!! route('companyCertificates.index') !!}"><i class="fa fa-edit"></i><span>Company Certificates</span></a>
</li>

<li class="{{ Request::is('documents*') ? 'active' : '' }}">
    <a href="{!! route('documents.index') !!}"><i class="fa fa-edit"></i><span>Documents</span></a>
</li>

<li class="{{ Request::is('certificateRequirements*') ? 'active' : '' }}">
    <a href="{!! route('certificateRequirements.index') !!}"><i class="fa fa-edit"></i><span>Certificate Requirements</span></a>
</li>

<li class="{{ Request::is('companyCertificateMessages*') ? 'active' : '' }}">
    <a href="{!! route('companyCertificateMessages.index') !!}"><i class="fa fa-edit"></i><span>Company Certificate Messages</span></a>
</li>

