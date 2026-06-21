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
        Schema::create('medical_center_unavailabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unavailability_id')->unique()->constrained('unavailabilities')->cascadeOnDelete();
            $table->foreignId('made_by_admin_id')->constrained('admins')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_center_unavailabilities');
    }
};
