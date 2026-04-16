<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://infyom.com/images/logo/blue_logo_150x150.jpg" class="img-circle"
                     alt="User Image"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>InfyOm</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- Sidebar Menu -->

        <ul class="sidebar-menu" data-widget="tree">
            @hasrole('empresa')
                @include('layouts.menu_empresa')
            @endhasrole
            @hasrole('empresa_estrangeira')
                @include('layouts.menu_empresa_estrangeira')
            @endhasrole
            @hasanyrole('superuser|admin|departamento|informatica|core|diretor')
                @include('layouts.menu_admin')
            @endhasanyrole
            {{--@hasrole('superuser')--}}
                {{--@include('layouts.menu')--}}
            {{--@endhasrole--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>