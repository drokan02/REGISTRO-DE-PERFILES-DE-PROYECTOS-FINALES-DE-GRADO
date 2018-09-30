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
        'id_area'
    ];


    public function scopeSubareas($query,$id,$buscar){
        return $query->where('id_area',$id)
                     ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
    }

    public function scopeBuscar($query, $buscar){
        return $query->whereNull('id_area')
                     ->where(DB::raw("CONCAT(codigo,' ',nombre)"), "LIKE", "%$buscar%");
    }
    
    public function scopeArea($query, $codigo,$nombre){
        return $query->where('codigo',$codigo)
                     ->orwhere('nombre',$nombre);
    }

}
