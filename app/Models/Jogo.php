<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'campeonato', 'time_casa', 'time_visitante',
        'data_jogo', 'status', 'odd_casa', 'odd_empate', 'odd_visitante'
    ];

    public function palpites()
    {
        return $this->hasMany(Palpite::class);
    }
}
