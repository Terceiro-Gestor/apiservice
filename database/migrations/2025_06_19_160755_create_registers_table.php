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
        Schema::create('registers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('people_id');  
            $table->uuid('service_id');  
            $table->string('registers_number')->unique(); // Unique registers number
            $table->date('registers_date'); // Date of registers 
            $table->date('expiration_date')->nullable(); // Optional expiration date for the registers
            $table->uuid('expiration_reason_id'); // Reason for the registration, referencing a 'registrations_reasons' table
            $table->enum('status', ['Ativo', 'Inativo', 'Pendente'])->default('Ativo'); // Status of the registration
            $table->text('notes')->nullable(); // Additional notes about the registration
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade'); // Assuming a 'services' table exists
            $table->foreign('expiration_reason_id')->references('id')->on('expiration_reasons')->onDelete('cascade'); // Assuming a 'expiration_reasons' table exists
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
