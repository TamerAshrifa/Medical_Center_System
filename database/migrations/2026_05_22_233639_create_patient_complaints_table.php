<?php

use App\Enums\En_PatientComplaintStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patient_complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->text('content');
            $table->enum('status', array_column(En_PatientComplaintStatus::cases(), 'value'))->default(En_PatientComplaintStatus::NEW);
            $table->foreignId('reviewed_by_admin_id')->nullable()->constrained('admins')->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_complaints');
    }
};
