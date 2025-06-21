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
        Schema::create('occurrences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('person_id'); // campo de relacionamento
            $table->uuid('register_id');
            $table->date('date')->nullable();
            $table->string('type')->nullable(); // tipo de ocorrência, ex: 'medical', 'legal', etc.
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('person_id')
                ->references('id')->on('people')
                ->onDelete('cascade');
            $table->foreign('register_id')
                ->references('id')->on('registers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occurrences');
    }
};
