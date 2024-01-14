<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function ($table) {
            $table->string('azure_auth_id')->nullable()->after('google_auth_email');
            $table->string('azure_auth_email')->nullable()->after('azure_auth_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('azure_auth_id');
            $table->dropColumn('azure_auth_email');
        });
    }
};
