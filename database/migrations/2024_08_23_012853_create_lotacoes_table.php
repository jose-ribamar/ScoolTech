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
        Schema::create('lotacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id')->on('docentes');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotacoes');
    }
};
