@extends('layouts.admin.index')
@section('css')
@endsection
@section('header')
    {{--<h4 class="font-weight-bold py-3 mb-0">Layouts and elements</h4>--}}
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("users.index")}}">Usuário</a></li>
            <li class="breadcrumb-item active">Cadastrar</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card mb-4">
        <h6 class="card-header">Usuário</h6>
        <div class="card-body">
            @include('adminlte-templates::common.errors')
            {!! Form::open(['route' => 'users.store']) !!}
            @include('users.fields')
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Select2 -->
    <script>
      $(function () {

        $('.role').on('change', function(){

          if(this.value == 3){
            $('.departamento').show();
            $("#department_id").prop('required',true);
          } else {
            $('.departamento').hide();
            $("#department_id").prop('required',false);
          }
        });
      });

      //DEPARTAMENTO ID 2
    </script>
@endsection
