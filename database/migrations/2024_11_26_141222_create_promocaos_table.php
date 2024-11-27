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
        Schema::create('promocaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('casa_aposta_id')->constrained('casa_de_apostas')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->float('valor_bonus');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocaos');
    }
};
