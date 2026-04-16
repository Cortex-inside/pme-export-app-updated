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
        Schema::create('announcements_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('company_announcement_id');
            $table->unsignedInteger('companie_id');
            $table->timestamps();

            $table->foreign('companie_id', 'fk_companie_id_companies_idx')
                ->references('id')->on('companies')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('company_announcement_id', 'fk_company_announcement_id_company_announcements_idx')
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
        Schema::dropIfExists('announcements_companies');
    }
};
