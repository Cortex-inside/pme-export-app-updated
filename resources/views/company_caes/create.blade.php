@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Cae
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'companyCaes.store']) !!}

                        @include('company_caes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
