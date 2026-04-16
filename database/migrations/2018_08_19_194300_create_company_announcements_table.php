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
        Schema::create('company_announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->integer('market_type');
            $table->integer('type_of_exposure');
            $table->integer('visibility');
            $table->integer('unit_of_measure_or_weight');
            $table->integer('amount');
            $table->integer('coin');
            $table->double('price',10,2);
            $table->integer('payment_model');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id', 'fk_announcements_company_idx')
                ->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('product_id', 'fk_announcements_product_idx')
                ->references('id')->on('products')
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
        Schema::dropIfExists('company_announcements');
    }
};
