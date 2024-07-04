<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manutencaoBateria extends Model
{
    use HasFactory; 
    protected $table = 'manutencao_baterias'; 
    protected $fillable = [
        'data',
        'bateria_id',
        'densidade',
        'tensao',
        'nivel',
        'num_elemento_cir',
        'qt_terminais_sul',
        'qt_substituicao_ele',
        'qt_ubstituicao_ter',
        'qt_substituicao_unioes',
        'estado',
        'inundada',
        'furada',
        'sulfatada',
        'drenagem',
        'ficha',
        'car_funcionamento',
        'obs',
        'user_id'
    ];
    public function bateria()
    {
        return $this->belongsTo(Bateria::class,'bateria_id','id'); 
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id'); 
    }
}
