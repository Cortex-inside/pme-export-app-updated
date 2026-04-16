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
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('certificate_category_id');
            $table->string('duration');
            $table->text('description');
            $table->text('name');
            $table->integer('status');
            $table->text('address');
            $table->dateTime('ini_date');
            $table->dateTime('end_date');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('department_id', 'fk_department_certificate_idx')
                ->references('id')->on('departments')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('certificate_category_id', 'fk_category_certificate_idx')
                ->references('id')->on('certificate_categories')
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
        Schema::dropIfExists('certificates');
    }
};
