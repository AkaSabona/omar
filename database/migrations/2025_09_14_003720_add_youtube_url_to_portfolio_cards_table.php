<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYoutubeUrlToPortfolioCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolio_cards', function (Blueprint $table) {
            if (!Schema::hasColumn('portfolio_cards', 'youtube_url')) {
                $table->string('youtube_url')->nullable()->after('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolio_cards', function (Blueprint $table) {
            if (Schema::hasColumn('portfolio_cards', 'youtube_url')) {
                $table->dropColumn('youtube_url');
            }
        });
    }
}
