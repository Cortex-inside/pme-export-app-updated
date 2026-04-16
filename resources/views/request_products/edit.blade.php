@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Request Product
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($requestProduct, ['route' => ['requestProducts.update', $requestProduct->id], 'method' => 'patch']) !!}

                        @include('request_products.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection