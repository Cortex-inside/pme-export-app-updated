@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="page-header clearfix">
            <h2>
                Departamentos
            </h2>
        </div>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                @if($groups->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($groups as $kye => $group)
                            <tr>
                                <td>{{$kye}}</td>
                                <td>{{$group}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center alert alert-info">Vazio!</h3>
                @endif
            </div>
        </div>
    </div>

@endsection