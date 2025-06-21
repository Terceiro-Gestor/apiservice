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
        Schema::create('expiration_reasons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->enum('type', [
                'Cadastro', 'Atualização', 'Reativação', 'Cancelamento', 'Transferência'
            ])->comment('Tipo de motivo para o registro');
            $table->text('description')->nullable()->comment('Descrição detalhada do motivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expiration_reasons');
    }
};
