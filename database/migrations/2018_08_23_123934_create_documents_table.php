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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('company_certificate_id');
            $table->unsignedInteger('requirement_id');
            $table->unsignedInteger('user_id');
            $table->integer('status');
            $table->integer('type');
            $table->string('url')->nullable();
            $table->text('text')->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->dateTime('disapproved_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_certificate_id', 'fk_company_document_idx')
                ->references('id')->on('company_certificates')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('requirement_id', 'fk_requirement_document_idx')
                ->references('id')->on('requirements')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('user_id', 'fk_user_document_idx')
                ->references('id')->on('users')
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
        Schema::dropIfExists('documents');
    }
};
