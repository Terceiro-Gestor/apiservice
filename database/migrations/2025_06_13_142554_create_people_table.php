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
        Schema::create('people', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('photo')->nullable();
            $table->string('full_name');
            $table->string('social_name')->nullable();
            $table->date('birth_date');
            $table->enum('gender', ['Masculino', 'Feminino', 'Outros'])->nullable();
            $table->enum('ethnicity', ['Branca', 'Preta', 'Parda', 'Amarela', 'Indígena', 'Outro'])->nullable();
            $table->enum('marital_status', ['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)', 'Separado(a)', 'Outro' ])->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('nis')->nullable();
            $table->string('cpf')->nullable()->unique();
            $table->string('rg')->nullable();
            $table->uuid('address_id')->nullable();
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
