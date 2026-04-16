@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Request Message
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($requestMessage, ['route' => ['requestMessages.update', $requestMessage->id], 'method' => 'patch']) !!}

                        @include('request_messages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection