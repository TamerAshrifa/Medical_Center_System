<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('made_by_admin_id')->nullable()->constrained('admins')->cascadeOnDelete();
            $table->integer('new_patients_count');
            $table->integer('appointments_count');
            $table->integer('visits_count');
            $table->string('visits_to_appointments_rate');
            $table->json('peak_hours');
            $table->json('busy_days');
            $table->integer('transfers_count');
            $table->integer('complaints_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_reports');
    }
};
