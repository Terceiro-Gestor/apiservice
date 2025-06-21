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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100)->nullable(); // Nome do empregado
            $table->string('email', 100)->unique()->nullable(); // Email do empregado
            $table->string('phone', 20)->nullable(); // Telefone do empregado
            $table->string('address', 255)->nullable(); // Endereço do empregado
            $table->string('cpf', 14)->unique()->nullable(); // CPF do empregado
            $table->string('rg', 20)->nullable(); // RG do empregado
            $table->string('social_security_number', 20)->nullable(); // Número de seguridade social
            $table->string('bank_account', 20)->nullable(); // Conta bancária do empregado
            $table->string('bank_name', 100)->nullable(); // Nome do banco
            $table->string('bank_branch', 10)->nullable(); // Agência bancária do empregado
            $table->string('employment_type', 50)->nullable(); // Tipo de emprego, ex: CLT, PJ
            $table->decimal('salary', 10, 2)->nullable(); // Salário do empregado
            $table->string('work_schedule', 50)->nullable(); // Horário de trabalho, ex: 9h-18h
            $table->string('emergency_contact_name', 100)->nullable(); // Nome do contato de emergência
            $table->string('education_level', 50)->nullable(); // Nível de escolaridade do empregado
            $table->string('photo')->nullable(); // Foto do empregado
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo'); // Status do emprego, ex: Ativo, Inativo
            $table->string('department', 100)->nullable(); // Departamento do empregado
            $table->string('notes')->nullable(); // Notas adicionais sobre o empregado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
