@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="page-header">
            <h3><i class="glyphicon glyphicon-plus"></i> Anúncios / Editar (#{{$announcement->id}}) </h3>
        </div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($announcement, ['route' => ['products.update', $announcement->id], 'method' => 'patch']) !!}

                    @include('company_announcements.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        //AJAX E PREENCHIMENTO AUTOMÁTICO DOS DADOS DO USUARIO
        var $product_category_id = $(".product_category_id");

        console.log("chegou aqui1");
        console.log($product_category_id);

        $product_category_id.change(function (e) {
            $(".allData").hide();
            var category_id = $(this).val();
            console.log("chegou aqui1");
            jQuery.ajax({
                type: 'GET',
                url: '/sysCompany/announcements/getProductsByCategory_ajax/'+category_id,
                success: function( data )
                {
                    console.log("chegou aqui");
                    console.log(data);

                    if(data != ""){
                        $(".product_id").empty();
                        $(".product_id").append('<option value=""></option>');
                        for(var i=0; i < data.length; i++){
                            console.log(data[i].name);
                            $(".product_id").append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                        }

                        $(".allData").show();

                    } else {
                        alert("Nenhum produto encontrado para essa categoria");
                    }
                },
                error: function (data) {
                    console.log("deu erro");
                    console.log(data);
                }
            });

        });
    </script>
@endsection
