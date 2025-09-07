<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAstronautSectionToSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('astronaut_section_title')->default('Exploring New Frontiers in Professional Experience')->after('profile_skills');
            $table->text('astronaut_section_description')->default('A journey of growth, learning, and delivering exceptional results across leading organizations - pushing boundaries like an astronaut explores space.')->after('astronaut_section_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['astronaut_section_title', 'astronaut_section_description']);
        });
    }
}
