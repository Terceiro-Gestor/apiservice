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
        Schema::create('referrals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('people_id');
            $table->uuid('register_id');
            $table->uuid('referred_by_id')->nullable();
            $table->uuid('service_id')->nullable();
            $table->date('date')->nullable();
            $table->enum('status', ['Pendente', 'Aprovado', 'Rejeitado'])->default('Pendente');
            $table->string('notes')->nullable();
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
            $table->foreign('referred_by_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
