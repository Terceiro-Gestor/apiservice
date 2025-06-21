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
        Schema::create('family_people', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('family_id');
            $table->uuid('people_id');
            $table->enum('relationship', [
                'Pai', 'Mãe', 'Filho(a)', 'Irmão(ã)', 'Cônjuge', 'Avô(ó)', 'Tio(a)', 'Primo(a)', 'Outro'
            ]);
            $table->boolean('composes_income')->default(false)->nullable();
            $table->boolean('lives_in_household')->default(false)->nullable();
            $table->enum('is', ['Responsável', 'Dependente']);
            $table->foreign('family_id')->references('id')->on('families')->onDelete('cascade');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_people');
    }
};
