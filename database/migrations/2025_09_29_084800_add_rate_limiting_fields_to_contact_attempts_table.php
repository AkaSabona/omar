<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRateLimitingFieldsToContactAttemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_attempts', function (Blueprint $table) {
            // Check if columns exist before adding them
            if (!Schema::hasColumn('contact_attempts', 'ip_address')) {
                $table->string('ip_address')->nullable();
            }
            if (!Schema::hasColumn('contact_attempts', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('contact_attempts', 'user_agent')) {
                $table->text('user_agent')->nullable();
            }
            if (!Schema::hasColumn('contact_attempts', 'last_attempt_at')) {
                $table->timestamp('last_attempt_at')->nullable();
            }
            if (!Schema::hasColumn('contact_attempts', 'attempt_count')) {
                $table->integer('attempt_count')->default(0);
            }
            if (!Schema::hasColumn('contact_attempts', 'blocked_until')) {
                $table->timestamp('blocked_until')->nullable();
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
        Schema::table('contact_attempts', function (Blueprint $table) {
            $table->dropColumn([
                'ip_address',
                'email',
                'user_agent',
                'last_attempt_at',
                'attempt_count',
                'blocked_until'
            ]);
        });
    }
}
