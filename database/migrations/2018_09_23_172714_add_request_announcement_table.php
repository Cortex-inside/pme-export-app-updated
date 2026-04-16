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
            $table->string('local_entrega')->nullable();
            $table->string('logistica')->nullable();
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
            $table->dropColumn('local_entrega');
        });
    }
};
