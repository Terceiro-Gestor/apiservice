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
        Schema::create('external_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');           // Nome do serviço, ex: CAPS Leste
            $table->string('type');           // Tipo do serviço, ex: Saúde Mental
            $table->string('organization');   // Nome da instituição, ex: Prefeitura de Ribeirão
            $table->string('contact')->nullable(); // Telefone, e-mail ou pessoa de contato
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_services');
    }
};
