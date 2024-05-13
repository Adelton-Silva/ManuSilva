<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $fillable = [
        'name',
        'name_cont',
        'telefone',
        'telemovel',
        'email',
        'morada',
        'cod_pos',
        'localidade',
        'pais',
    ];
}
