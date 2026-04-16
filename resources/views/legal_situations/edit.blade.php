@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Legal Situation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($legalSituation, ['route' => ['legalSituations.update', $legalSituation->id], 'method' => 'patch']) !!}

                        @include('legal_situations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection