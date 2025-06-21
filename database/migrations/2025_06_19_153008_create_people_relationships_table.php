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
        Schema::create('people_relationships', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('person_id');
            $table->uuid('related_person_id');
            $table->enum('relationship', [
                'Pai', 'Mãe', 'Filho(a)', 'Irmão(ã)', 'Cônjuge', 'Avô(ó)', 'Tio(a)', 'Primo(a)', 'Outro'
            ]);
            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('related_person_id')->references('id')->on('people')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_relationships');
    }
};
