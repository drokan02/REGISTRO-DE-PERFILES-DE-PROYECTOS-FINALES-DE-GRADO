<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargaHoraria extends Model
{
    protected $table='cargahoraria';
    protected $fillable = [  
        'carga_horaria',  
    ];

    public function docentes(){
        return $this->hasMany(Docente::class);
    }
}


