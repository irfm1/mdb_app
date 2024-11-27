<?php

namespace Database\Seeders;

use App\Models\Pagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pagamento::create([
            'usuario_id' => 1,
            'valor' => 200.0,
            'metodo_pagamento' => 'Cartão',
            'status' => 'Completo',
            'data_pagamento' => now(),
        ]);

//        Pagamento::create([
//            'usuario_id' => 2,
//            'valor' => 100.0,
//            'metodo_pagamento' => 'Pix',
//            'status' => 'Pendente',
//            'data_pagamento' => now()->addDay(),
//        ]);
    }
}
