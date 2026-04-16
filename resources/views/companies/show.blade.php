@extends('layouts.admin.index')
@section('header')
    <div class="d-flex">
        <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0"></h4></div>
        <div class="">
            @can('companies.edit')
            <a href="{!! route('companies.edit', [$company->uuid]) !!}" class='btn
                    btn-info'><i class="far fa-edit"></i> Editar</a>&nbsp;
            @endcan

            @if($company->status == 1)
                <a class="btn btn-success " role="group" href="{{ route('companies.approve', $company->uuid) }}" onclick="if(confirm('Deseja realmente aprovar essa empresa?')) { return true } else {return false };"><i class="feather icon-thumbs-up"></i>  Aprovar</a>

                <a class="btn btn-warning" style="color:white" data-toggle="modal" data-target="#myModal" role="group"><i class="feather icon-thumbs-down"></i> Reprovar</a>
            @else

            @endif
        </div>
    </div>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item" ><a href="{{route("companies.index")}}">Empresas</a></li>
        </ol>
    </div>
@endsection

@section('content')


    <div class="card mb-4">
        <h6 class="card-header">Empresa Estrangeira</h6>
        <div class="card-body">
            @include('companies.show_fields')

        </div>
    </div>

    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{!! route('companies.index') !!}" class="btn btn-default"><span
                            class="fas fa-arrow-left"></span> Voltar</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Reprovar pedido de cadastro</h4>
                </div>
                {!! Form::open(['route' => 'companies.disapprove']) !!}
                <div class="modal-body">
                    <input type="hidden" name="company_id" value="{{$company->id}}">

                    <div class="form-group">
                        {!! Form::label('motive_disapprove', 'Motivo:') !!}
                        {!! Form::textarea('motive_disapprove', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Reprovar cadastro', ['class' => 'btn btn-danger  waves-effect waves-light', 'onClick' => 'if(confirm
                    ("Deseja realmente reprovar esse cadastro?")) { return true } else {return false };']) !!}

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
