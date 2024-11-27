<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'valor', 'metodo_pagamento', 'status', 'data_pagamento'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
