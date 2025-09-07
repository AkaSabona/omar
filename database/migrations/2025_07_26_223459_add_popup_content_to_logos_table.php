<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPopupContentToLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->string('popup_title')->nullable();
            $table->text('popup_description')->nullable();
            $table->string('popup_video_url')->nullable();
            $table->json('popup_content')->nullable(); // For key deliverables
            $table->json('popup_additional_sections')->nullable(); // For additional sections
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->dropColumn([
                'popup_title',
                'popup_description', 
                'popup_video_url',
                'popup_content',
                'popup_additional_sections'
            ]);
        });
    }
}
