<?php

use App\Enums\AppointmentStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->restrictOnDelete();
            $table->foreignId('doctor_id')->constrained()->restrictOnDelete();
            $table->dateTime('datetime');
            $table->enum('status', array_column(AppointmentStatusEnum::cases(), 'value'))->default(AppointmentStatusEnum::PENDING);
            $table->string('active_booking_key')->unique('appointments_active_booking_key_unique')->nullable();
            // $table->unique(['doctor_id', 'datetime', 'status']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
