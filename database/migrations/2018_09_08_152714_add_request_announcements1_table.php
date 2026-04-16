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
            $table->integer('status')->nullable()->comment("1 - Aguardando aprovação 2 - Cancelado 3 - Aprovado");
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
            $table->dropColumn('status');
        });
    }
};
