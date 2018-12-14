<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class Area extends Model
{   
    protected $table='area';
    protected $fillable = [
        'id',
        'codigo',
        'nombre',
        'descripcion',
        'area_id',
        'carrera_id'
    ];

    public function sub(){
        return $this->hasMany(Subarea::class);
    }
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
        return $query->whereNull('area_id');
    }

    
    public function scopeSubareas($query){
        return $query->whereNotNull('area_id');
    }

    public function scopeBuscarSubareas($query,$id,$buscar){
        if($buscar){
            return $query->where('area_id',$id)
                        ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
        }else{
            return $query->where('area_id',$id);
        }
    }

    public function scopeBuscarAreas($query, $buscar){
        if($buscar){
            return $query->whereNull('area_id')
                        ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
        }else{
            return $query->whereNull('area_id');
        }
    }
    
    public function scopeSubareasArea($query,$id){
        return $query->where('area_id',$id);
    }

    public function scopeAreasCarrera($query,$carrera_id){
        return $query->whereNull('area_id')->whereHas('carreras', function ($query) use ( $carrera_id){
            $query->where('carrera_id',$carrera_id);
        });
    }

    public function scopeSubareasCarrera($query,$carrera_id){
        return $query->whereNotNull('area_id')
                     ->whereHas('carreras', function ($query) use ( $carrera_id){
                                $query->where('carrera_id',$carrera_id);
                            });
    }

}
