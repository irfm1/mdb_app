<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::create([
            'titulo' => 'Estratégias para Apostas',
            'descricao' => 'Aprenda as melhores estratégias para maximizar seus lucros.',
            'preco' => 199.99,
            'url_conteudo' => '/cursos/estrategias-apostas',
        ]);

        Curso::create([
            'titulo' => 'Introdução às Apostas',
            'descricao' => 'Curso básico para iniciantes em apostas esportivas.',
            'preco' => 99.99,
            'url_conteudo' => '/cursos/introducao-apostas',
        ]);
    }
}
