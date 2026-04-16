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
        Schema::create('request_announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->unsignedInteger('company_announcements_id');

            $table->integer("unit_of_measure_or_weight")->nullable();
            $table->integer("amount")->nullable();
            $table->integer("coin")->nullable();
            $table->double('price',10,2)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_announcements_id', 'fk_requests_company_announcements_idx')
                ->references('id')->on('company_announcements')
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
        Schema::dropIfExists('request_announcements');
    }
};
