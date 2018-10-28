<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Modal extends Model
{
    protected $table='modalidad';
    protected $fillable = [
        'id','codigo_mod','nombre_mod', 'descripsion_mod'
    ];

    
    public function perfiles(){
        return $this->hasMany(Perfil::class);
    }

    public function scopeBuscar($query, $buscar){
        return $query->whereNull('id')
                     ->where(DB::raw("CONCAT(codigo_mod,' ',nombre_mod)"), "LIKE", "%$buscar%");
   
	
	}

}