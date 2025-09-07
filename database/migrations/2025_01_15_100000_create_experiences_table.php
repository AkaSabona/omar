<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('position');
            $table->string('duration');
            $table->string('year');
            $table->text('description')->nullable();
            $table->string('logo_class')->default('bg-primary'); // CSS class for logo background
            $table->string('logo_icon')->nullable(); // FontAwesome icon class
            $table->string('logo_text')->nullable(); // Text to display in logo circle
            $table->boolean('is_clickable')->default(false);
            $table->json('target_logos')->nullable(); // Array of logo IDs to highlight
            $table->integer('order_position')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}