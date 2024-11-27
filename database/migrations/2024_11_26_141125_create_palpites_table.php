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
        Schema::create('palpites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('jogo_id')->constrained('jogos')->onDelete('cascade');
            $table->enum('tipo_palpite', ['1x2', 'Handicap', 'Over/Under'])->default('1x2');
            $table->float('odd_selecionada');
            $table->enum('resultado', ['Vitória', 'Derrota', 'Empate'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palpites');
    }
};
