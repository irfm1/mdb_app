<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pacote extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'tipo', 'preco', 'beneficios'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'pacote_usuario')
            ->withPivot('data_inicio', 'data_fim')
            ->withTimestamps();
    }
}


