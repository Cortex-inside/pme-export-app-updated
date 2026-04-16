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
        Schema::create('company_caes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('cae_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id', 'fk_company_caes_idx')
                ->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('cae_id', 'fk_cae_companies_idx')
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
        Schema::dropIfExists('company_caes');
    }
};
