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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->string('campeonato');
            $table->string('time_casa');
            $table->string('time_visitante');
            $table->dateTime('data_jogo');
            $table->enum('status', ['Aberto', 'Fechado'])->default('Aberto');
            $table->float('odd_casa');
            $table->float('odd_empate');
            $table->float('odd_visitante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
