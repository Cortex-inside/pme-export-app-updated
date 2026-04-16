<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Renamed from password_resets to password_reset_tokens (Laravel 10+).
 * The old table name is kept for backward compatibility with existing deployments;
 * the config/auth.php already points to password_reset_tokens.
 * Run a manual rename if migrating an existing database:
 *   RENAME TABLE password_resets TO password_reset_tokens;
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create password_reset_tokens (Laravel 10+ standard name)
        if (! Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        // Keep backward-compatible alias if legacy table still exists
        // (safe to remove once the old table has been migrated)
        if (! Schema::hasTable('password_resets')) {
            Schema::create('password_resets', function (Blueprint $table) {
                $table->string('email')->index();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('password_resets');
    }
};
