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
        Schema::create('casa_de_apostas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('logo_url')->nullable();
            $table->text('descricao')->nullable();
            $table->float('avaliacao')->default(0);
            $table->string('url_review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casa_de_apostas');
    }
};
