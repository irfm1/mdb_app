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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->string('genero');
            $table->string('telefone');
            $table->string('cpf');
            $table->string('rg')->nullable();
            $table->date('data_nascimento');
            $table->string('nacionalidade')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('plan')->default('free');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};
