<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Area extends Model
{   
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'id_area',
        'carrera_id'
    ];


    public function scopeSubareas($query,$id,$buscar){
        if($buscar){
            return $query->where('id_area',$id)
                        ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%")
                        ->ordenBy('id','ASC');
        }else{
            return $query->where('id_area',$id);
        }
    }

    public function scopeBuscar($query, $buscar){
        if($buscar){
            return $query->whereNull('id_area')
                        ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
        }else{
            return $query->whereNull('id_area');
        }
    }
    
    public function scopeArea($query, $codigo,$nombre){
        return $query->where('codigo',$codigo)
                     ->orwhere('nombre',$nombre);
    }

}
