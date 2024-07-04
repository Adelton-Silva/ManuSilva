<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bateria extends Model
{
    use HasFactory; 
    protected $table = 'baterias'; 
    protected $fillable = [
        'cliente_id',
        'tipo',
        'matricula',
        'emp_marca',
        'emp_modelo',
        'car_tipo',
        'car_matricula',
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id'); 
    }
}
