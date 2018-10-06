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
    
   

}
