<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    protected $fillable = ['casa_aposta_id', 'titulo', 'descricao', 'valor_bonus', 'data_inicio', 'data_fim'];

    public function casaDeAposta()
    {
        return $this->belongsTo(CasaDeAposta::class);
    }
}
