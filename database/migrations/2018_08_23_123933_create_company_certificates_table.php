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
        Schema::create('company_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('certificate_id');
            $table->integer('status');
            $table->dateTime('request_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id', 'fk_company_certificate_idx')
                ->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('certificate_id', 'fk_certificate_company_idx')
                ->references('id')->on('certificates')
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
        Schema::dropIfExists('company_certificates');
    }
};
