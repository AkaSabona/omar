<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('portfolio_cards', 'youtube_url')) {
            Schema::table('portfolio_cards', function (Blueprint $table) {
                $table->string('youtube_url')->nullable()->after('image');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('portfolio_cards', 'youtube_url')) {
            Schema::table('portfolio_cards', function (Blueprint $table) {
                $table->dropColumn('youtube_url');
            });
        }
    }
};