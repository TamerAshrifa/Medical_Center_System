<?php

use App\Enums\PatientComplaintStatusEnum;
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
            $table->enum('status', array_column(PatientComplaintStatusEnum::cases(), 'value'))->default(PatientComplaintStatusEnum::NEW);
            $table->foreignId('reviewed_by_admin_id')->nullable()->constrained('admins')->restrictOnDelete();
            $table->text('reply')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_complaints');
    }
};
