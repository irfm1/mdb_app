<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palpite extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'jogo_id', 'tipo_palpite', 'odd_selecionada', 'resultado'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function jogo()
    {
        return $this->belongsTo(Jogo::class);
    }
}
