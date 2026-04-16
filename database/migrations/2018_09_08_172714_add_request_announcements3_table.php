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
        Schema::table('request_announcements', function (Blueprint $table) {

            $table->unsignedInteger('product_id');

            $table->foreign('product_id', 'fk_requests_product_announcements_idx')
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
        Schema::table('request_announcements', function (Blueprint $table) {
            $table->dropColumn('product_id');
        });
    }
};
