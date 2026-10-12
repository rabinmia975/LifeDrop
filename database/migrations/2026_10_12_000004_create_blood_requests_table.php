<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('patient_name')->nullable();
            $table->unsignedTinyInteger('patient_age')->nullable();
            $table->string('patient_gender', 20)->nullable();
            $table->string('blood_group', 5);
            $table->unsignedTinyInteger('bags_needed')->default(1);
            $table->date('needed_by');
            $table->string('urgency', 20)->default('সাধারণ'); // জরুরি | সাধারণ | পূর্বনির্ধারিত
            $table->string('hospital_name');
            $table->string('hospital_address')->nullable();
            $table->string('division');
            $table->string('district');
            $table->string('upazila')->nullable();
            $table->string('contact_phone', 20);
            $table->text('description')->nullable();
            $table->string('status', 20)->default('active'); // active | found | closed
            $table->timestamps();

            $table->index(['status', 'blood_group', 'division', 'district']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
