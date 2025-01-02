<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //model de perfil de usuario com genero, telefone, data de nascimento, nascinaliade, cpf, rg para user_id
    protected $fillable = [
        'genero',
        'telefone',
        'data_nascimento',
        'nacionalidade',
        'cpf',
        'rg',
        'user_id',
        'plan',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
