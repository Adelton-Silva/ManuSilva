<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carregador extends Model
{
    use HasFactory;
    protected $table = 'carregadors';
    protected $fillable = [
        'cliente_id',
        'marca',
        'modelo',
        'num_serie',
        'descri_avaria',
        'data_entrada',
        'descri_atividade',
        'data_saida',
        'image',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }
}
