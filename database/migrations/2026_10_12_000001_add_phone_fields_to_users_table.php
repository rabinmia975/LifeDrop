<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->unique()->after('email');
            $table->string('role', 20)->default('user')->after('phone');
            $table->boolean('is_phone_verified')->default(false)->after('role');
            $table->boolean('is_active')->default(true)->after('is_phone_verified');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'role', 'is_phone_verified', 'is_active']);
        });
    }
};
