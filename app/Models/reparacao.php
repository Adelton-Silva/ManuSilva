<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reparacao extends Model
{
    use HasFactory;
    protected $table = 'reparacaos'; 
    protected $fillable = [
        'carregador_id',
        'user_id',
        'relatorio_ativi',
        'material_gasto',
        'tempo_gasto',
        'estado',
        'data_saida',
        'estado_faturacao',
    ];

    public function carregador()
    {
        return $this->belongsTo(Carregador::class,'carregador_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
