@extends('layouts.admin.index')
@section('header')
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("exchange.requests")}}">Pedidos
                </a></li>
            <li class="breadcrumb-item active">Listar</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Pedidos</h6>
        <div class="card-body">
            @include('flash::message')

            <div class="table-responsive">
                @include('exchange.request.table-todos')
            </div>
        </div>

        <div class="card-footer">
            {{ $requests->links() }}
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

