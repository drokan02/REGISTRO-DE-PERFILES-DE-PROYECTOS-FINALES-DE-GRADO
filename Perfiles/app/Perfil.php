<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table='perfil';

    protected $fillable = [
        'modalidad_id',
        'estudiante_id',
        'docente_id',
        'director_id',
        'tutor_id',
        'area_id',
        'subarea_id',
        'titulo',
        'institucion',
        'encargado',
        'objetivo_gen',
        'objetivo_esp',
        'descripcion'
    ];

    public function modalidad(){
        return $this->belongsTo(Modal::class,'modalidad_id');
    }

    public function estudiante(){
        return $this->belongsTo(Estudiante::class,'estudiante_id');
    }

    public function docente(){
        return $this->belongsTo(Docente::class,'docente_id');
    }

    public function directo(){
        return $this->belongsTo(Docente::class,'director_id');
    }

    public function area(){    
        return $this->belongsTo(Area::class,'area_id');
    }

    public function subarea(){    
        return $this->belongsTo(Area::class,'subarea_id');
    }
}
