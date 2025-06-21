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
        Schema::create('dailys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('people_id');
            $table->uuid('register_id');
            $table->date('date')->nullable();
            $table->enum('type', ['Entrada', 'Saída']);
            $table->string('description', 255)->nullable();
            $table->boolean('case_discussion')->default(false);
            $table->timestamps();
            $table->foreign('people_id')
                ->references('id')->on('people')
                ->onDelete('cascade');
            $table->foreign('register_id')
                ->references('id')->on('registers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailys');
    }
};
