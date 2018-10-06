<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Modal extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','codigo_mod','nombre_mod', 'descripsion_mod'
    ];

    protected $table='modalidad';
    public $timestamps=false;
	

    public function scopeBuscar($query, $buscar){
        return $query->whereNull('id')
                     ->where(DB::raw("CONCAT(codigo_mod,' ',nombre_mod)"), "LIKE", "%$buscar%");
   
	
	}

}