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
        Schema::create('caes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('cae_id')->nullable();
            $table->string('code');
            $table->string('description');
            $table->string('designation');
            $table->string('rev')->nullable();
            $table->string('other')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cae_id', 'fk_caes_caes_idx')
                ->references('id')->on('caes')
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
        Schema::dropIfExists('caes');
    }
};
