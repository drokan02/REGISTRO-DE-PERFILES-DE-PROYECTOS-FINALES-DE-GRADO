<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Area extends Model
{   
    protected $table='area';
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'id_area',
        'carrera_id'
    ];


    public function profesionales(){    
         return $this->belongsToMany(Profesional::class,'profesional_area');
    }

    public function carreras(){    
        return $this->belongsToMany(Carrera::class,'area_carrera');
   }

    public function perfiles(){    
         return $this->belongsToMany(Perfil::class,'perfil_area');
    }
    public function scopeAreas($query){
        return $query->whereNull('id_area');
    }

    
    public function scopeSubareas($query){
        return $query->whereNotNull('id_area');
    }

    public function scopeBuscarSubareas($query,$id,$buscar){
        if($buscar){
            return $query->where('id_area',$id)
                        ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
        }else{
            return $query->where('id_area',$id);
        }
    }

    public function scopeBuscarAreas($query, $buscar){
        if($buscar){
            return $query->whereNull('id_area')
                        ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
        }else{
            return $query->whereNull('id_area');
        }
    }
    
    public function scopeSubareasArea($query,$id){
        return $query->where('id_area',$id);
    }

    public function scopeAreasCarrera($query,$carrera_id){
        return $query->whereNull('id_area')->whereHas('carreras', function ($query) use ( $carrera_id){
            $query->where('carrera_id',$carrera_id);
        });
    }

    public function scopeSubareasCarrera($query,$carrera_id){
        return $query->whereNotNull('id_area')
                     ->whereHas('carreras', function ($query) use ( $carrera_id){
                                $query->where('carrera_id',$carrera_id);
                            });
    }

}
