@extends('layouts.adminlte')
@section('css')
<link rel="stylesheet" href="/bower_components/AdminLTE/plugins/select2/select2.min.css">
@endsection
@section('header')
    <div class="page-header clearfix">
        <h3>
            Exportar OSs
        </h3>
    </div>
@endsection

@section('content')
    @include('messages')
    @include('error')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Exportar OSs para arquivo Excel</h3>
                    </div>
                </div>
                    <form class="send-form" action="{{ route('export.export') }}" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div>Agendado</div>
                                    <input type="date" class="form-control" id="scheduled_date" name="scheduled_date" value="{{ app('request')->input('scheduled_date') }}"  required>
                                </div>
                                <div class="col-md-4">
                                    Tipo Exportação
                                    <select class="type_export" id="type_export" name="type_export" data-placeholder="Tipo Exportação" required>
                                        <option value="1" {{((app('request')->input('type_export')==1) ? "selected":"")}}>Produtos</option>
                                        <option value="2" {{((app('request')->input('type_export')==2) ? "selected":"")}}>Certificados</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    Técnico
                                    <select class="select2" id="operator_id" name="operator_id" data-placeholder="Técnico">
                                        <option></option>
                                        <option value="x" {{((app('request')->input('operator_id')=="x") ? "selected":"")}}>Sem técnico associado</option>
                                        @forelse($operators as $operator)
                                            <option value="{{$operator->id}}" {{((app('request')->input('operator_id')==$operator->id) ? "selected":"")}}>{{$operator->id}} - {{$operator->name}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer col-md-12">
                            <button type="submit" id="btnGerar" class="btn btn-success pull-right" >Gerar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts2')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Select2 -->
    <script src="/bower_components/AdminLTE/plugins/select2/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2({
                allowClear: true,
                width: "100%"
            });
            $(".type_export").select2({
                allowClear: false,
                width: "100%"
            });

            $('.filtro_date').datepicker({
                format: 'dd/mm/yyyy',
                language: 'pt-BR',
                weekStart: 0,
                todayHighlight: true,
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior'
            });

            $('.send-form').on('submit', function() {
                // $("#btnGerar").prop('disabled',true);
                $("#btnGerar").html('Aguarde...');

                setTimeout(function(){ $("#btnGerar").html('Gerar'); }, 22000);
            });
        });
    </script>
@endsection