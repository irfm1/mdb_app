<?php

namespace Database\Seeders;

use App\Models\CasaDeAposta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasaDeApostaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CasaDeAposta::create([
            'nome' => 'Bet365',
            'logo_url' => '/logos/bet365.png',
            'descricao' => 'Uma das maiores casas de apostas do mundo.',
            'avaliacao' => 4.8,
            'url_review' => 'https://www.bet365.com',
        ]);

        CasaDeAposta::create([
            'nome' => 'Betano',
            'logo_url' => '/logos/betano.png',
            'descricao' => 'Popular em apostas esportivas.',
            'avaliacao' => 4.5,
            'url_review' => 'https://www.betano.com',
        ]);
    }
}
