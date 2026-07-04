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
        Schema::create('exception_logs', function (Blueprint $table) {
            $table->id();
            $table->string('error_message');
            $table->string('file')->nullable();
            $table->string('line')->nullable();
            $table->longText('track')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exception_logs');
    }
};
