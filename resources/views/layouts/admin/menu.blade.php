    <!-- [ Layout sidenav ] Start -->
    <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
        <!-- Brand demo (see assets/css/demo/demo.css) -->
        <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        {{--<img src="/assets/img/logo.png" alt="TurmaVip" class="img-fluid">--}}
                    </span>
            <a href="/admin" class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{strtoupper(env
            ("APP_NAME"))}}</a>
            <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                <i class="ion ion-md-menu align-middle"></i>
            </a>
        </div>
        <div class="sidenav-divider mt-0"></div>

        @hasrole('empresa')
            @include('layouts.admin.menu_empresa')
        @endhasrole
        @hasrole('empresa_estrangeira')
            @include('layouts.admin.menu_empresa_estrangeira')
        @endhasrole
        @hasanyrole('superuser|admin|departamento|informatica|core|diretor')
            @include('layouts.admin.menu_admin')
        @endhasanyrole

    </div>
    <!-- [ Layout sidenav ] End -->