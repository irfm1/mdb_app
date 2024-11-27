<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasaDeAposta extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'logo_url', 'descricao', 'avaliacao', 'url_review'];

    public function promocoes()
    {
        return $this->hasMany(Promocao::class);
    }
}
