@extends('layouts.admin.index')

@section('content')
    <section class="content-header">
        <h1>
            Company Certificate
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'companyCertificates.store']) !!}

                        @include('company_certificates.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
