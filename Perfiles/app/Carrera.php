<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carrera extends Model
{
    protected $table='carrera';
    protected $fillable = [
        'codigo_carrera','nombre_carrera', 'descripcion'
    ];
    public function scopeName($query,$name){
        if (trim($name) != ""){
            $query->where(DB::raw("CONCAT(codigo_carrera,' ',nombre_carrera)"),'like',"%$name%");
        }
    }
    public function estudiantes(){
        return $this->hasMany(Estudiante::class);
    }

    public function profesionales(){
        return $this->hasMany(Profesional::class);
    }
}
