<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhadeObraReparacao extends Model
{
    use HasFactory;
    protected $table = 'folhade_obra_reparacaos'; 
    protected $fillable = [
        'repara_id',
        'data_intervencao',
        'material_gasto',
        'horas',
        'relizado_por',
    ];

    public function cliente()
    {
        return $this->belongsTo(Reparacao::class,'repara_id','id');
    }
}
