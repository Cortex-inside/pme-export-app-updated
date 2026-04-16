<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('announcements_images', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('company_announcement_id');
            $table->integer('user_id');
            $table->integer('type');
            $table->string('url');
            $table->string('name');
            $table->string('text');
            $table->string('original_name');
            $table->timestamps();

//            $table->foreign('company_announcement_id', 'fk_company_announcement_images_id_products_idx')
//                ->references('id')->on('company_announcements')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
//
//            $table->foreign('user_id', 'fk_user_products_images_idx')
//                ->references('id')->on('users')
//                ->onDelete('restrict')
//                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements_images');
    }
};
