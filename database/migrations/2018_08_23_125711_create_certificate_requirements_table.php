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
        Schema::create('certificate_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('certificate_id');
            $table->unsignedInteger('requirement_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('certificate_id', 'fk_certificate_requirement_idx')
                ->references('id')->on('certificates')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('requirement_id', 'fk_requirement_certificate_idx')
                ->references('id')->on('requirements')
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
        Schema::dropIfExists('certificate_requirements');
    }
};
