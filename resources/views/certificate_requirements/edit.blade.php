@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Certificate Requirement
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($certificateRequirement, ['route' => ['certificateRequirements.update', $certificateRequirement->id], 'method' => 'patch']) !!}

                        @include('certificate_requirements.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection