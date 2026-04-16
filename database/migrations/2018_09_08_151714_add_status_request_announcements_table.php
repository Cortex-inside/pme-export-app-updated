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
            $table->unsignedInteger('company_id_request')->nullable();

            $table->foreign('company_id_request', 'fk_company_id_request_idx')
                ->references('id')->on('companies')
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
            $table->dropColumn('company_id_request');
        });
    }
};
