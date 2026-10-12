<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('phone', 20);
            $table->string('blood_group', 5);
            $table->unsignedTinyInteger('age')->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('division');
            $table->string('district');
            $table->string('upazila')->nullable();
            $table->string('area')->nullable();
            $table->string('address')->nullable();
            $table->date('last_donation_date')->nullable();
            $table->boolean('is_available')->default(true);
            $table->string('status', 20)->default('pending'); // pending | approved | rejected
            $table->unsignedInteger('total_donations')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index(['blood_group', 'division', 'district', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
