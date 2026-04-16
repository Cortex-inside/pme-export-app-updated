<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->integer('status')->default(4)->comment("
            1- Aguardando aprovação - Quando é feito o cadastro inicial nas 2 fases e está pendente de um departamento aprovar
            2- Cadastro cancelado - Quando for necessário cancelar aquele cadastro no sistema
            3- Empresa desativada - Desativar empresa para não ter acesso a plataforma
            4- Revisar documentos/informações - Quando for necessário que uma empresa tenha que reenviar documentos 
            ");
            $table->unsignedInteger('legal_situation_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->string('initials')->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('locality')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('website')->nullable();
            $table->string('nuit')->unique()->nullable();
            $table->string('nuit_doc')->nullable();
            $table->string('alvara')->unique()->nullable();
            $table->string('alvara_doc')->nullable();
            $table->string('initial_investment')->nullable();
            $table->integer('business_volume')->nullable();
            $table->integer('number_of_workers_h')->nullable();
            $table->integer('number_of_workers_m')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('legal_situation_id', 'fk_situacao_juridica_empresa_idx')
                ->references('id')->on('legal_situations')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('district_id', 'fk_distrito_empresa_idx')
                ->references('id')->on('districts')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
