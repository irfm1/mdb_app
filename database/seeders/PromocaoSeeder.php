<?php

namespace Database\Seeders;

use App\Models\Promocao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promocao::create([
            'casa_aposta_id' => 1,
            'titulo' => 'Bônus de Boas-vindas',
            'descricao' => 'Ganhe 100% no seu primeiro depósito até R$500.',
            'valor_bonus' => 500.0,
            'data_inicio' => now(),
            'data_fim' => now()->addMonth(),
        ]);

        Promocao::create([
            'casa_aposta_id' => 2,
            'titulo' => 'Aposta Grátis',
            'descricao' => 'Receba uma aposta grátis de R$50 ao cadastrar-se.',
            'valor_bonus' => 50.0,
            'data_inicio' => now(),
            'data_fim' => now()->addWeeks(2),
        ]);
    }
}
