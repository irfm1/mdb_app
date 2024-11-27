<?php

namespace Database\Seeders;

use App\Models\Jogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jogo::create([
            'campeonato' => 'Campeonato Brasileiro',
            'time_casa' => 'Flamengo',
            'time_visitante' => 'Palmeiras',
            'data_jogo' => now()->addDays(3),
            'status' => 'Aberto',
            'odd_casa' => 1.8,
            'odd_empate' => 3.2,
            'odd_visitante' => 4.5,
        ]);

        Jogo::create([
            'campeonato' => 'Champions League',
            'time_casa' => 'Real Madrid',
            'time_visitante' => 'Liverpool',
            'data_jogo' => now()->addWeek(),
            'status' => 'Aberto',
            'odd_casa' => 2.1,
            'odd_empate' => 3.1,
            'odd_visitante' => 3.9,
        ]);
    }
}
