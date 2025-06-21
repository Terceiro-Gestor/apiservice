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
        Schema::create('financial_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('people_id');
            $table->uuid('category_financial_id');
            $table->decimal('amount', 10, 2); // Valor da renda ou despesa
            $table->date('date'); // Data da transação
            $table->string('description')->nullable(); // Descrição opcional
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('category_financial_id')->references('id')->on('category_financial')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_profiles');
    }
};
