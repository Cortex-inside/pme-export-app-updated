@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Email
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyEmail, ['route' => ['companyEmails.update', $companyEmail->id], 'method' => 'patch']) !!}

                        @include('company_emails.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection