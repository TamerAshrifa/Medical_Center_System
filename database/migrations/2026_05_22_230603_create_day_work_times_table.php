<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('day_work_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weekday_id')->constrained('week_days')->restrictOnDelete();
            $table->time('start_time');
            $table->time('end_time');
            $table->foreignId('work_schedule_id')->constrained('work_schedules')->restrictOnDelete();
            $table->unique(['weekday_id', 'work_schedule_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('day_work_times');
    }
};
