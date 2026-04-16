@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Pedidos Fechados</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('exchange.request.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
@section('AdminLTEScript')
    <!-- DataTables -->
    <script>
      $(function () {
        var AdminLTEOptions = {
          //Enable sidebar expand on hover effect for sidebar mini
          //This option is forced to true if both the fixed layout and sidebar mini
          //are used together
          sidebarExpandOnHover: true,
          //BoxRefresh Plugin
          enableBoxRefresh: true,
          //Bootstrap.js tooltip
          enableBSToppltip: true
        };
      });
    </script>
@endsection

