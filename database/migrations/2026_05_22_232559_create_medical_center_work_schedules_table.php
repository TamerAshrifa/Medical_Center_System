<?php

use App\Enums\WorkScheduleTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medical_center_work_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_schedule_id')->unique()->constrained('work_schedules')->cascadeOnDelete();
            $table->foreignId('made_by_admin_id')->constrained('admins')->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_center_work_schedules');
    }
};
