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
        Schema::create('suspensions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('people_id');
            $table->uuid('register_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('reason')->nullable(); // Motivo da suspensão
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo'); // Status da suspensão
            $table->timestamps();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspensions');
    }
};
