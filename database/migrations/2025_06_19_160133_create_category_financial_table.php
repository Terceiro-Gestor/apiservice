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
        Schema::create('category_financial', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name'); // Ex: Salary, Bolsa Família, Rent, Food
            $table->enum('type', ['Renda', 'Despesa', 'Beneficio', 'BPC']); // Para filtrar por tipo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_financial');
    }
};
