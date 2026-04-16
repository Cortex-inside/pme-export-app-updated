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
        Schema::create('announcements_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('company_announcement_id');
            $table->unsignedInteger('user_id');
            $table->integer('type')->nullable();
            $table->string('url')->nullable();
            $table->string('name')->nullable();
            $table->text('text')->nullable();
            $table->string('original_name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_announcement_id', 'fk_company_announcement_id_products_idx')
                ->references('id')->on('company_announcements')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('user_id', 'fk_user_products_document_idx')
                ->references('id')->on('users')
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
        Schema::dropIfExists('announcements_documents');
    }
};
