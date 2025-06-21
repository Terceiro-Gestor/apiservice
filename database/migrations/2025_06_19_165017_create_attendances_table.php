<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->uuid('people_id');
            $table->uuid('register_id');
            $table->uuid('employee_id');

            $table->enum('service_type', [
                'psychology',
                'social',
                'pedagogical',
                'legal',
                'orientation',
                'other'
            ])->default('social');

            $table->enum('attendance_type', [
                'individual',
                'group',
                'family',
                'home_visit',
                'community'
            ])->default('individual');
            
            $table->date('attendance_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('notes')->nullable(); // Observações sobre o atendimento

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
