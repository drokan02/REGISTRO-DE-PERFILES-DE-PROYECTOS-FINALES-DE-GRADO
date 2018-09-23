<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    protected $fillable = [
        'nombre_rol','privilegios'
    ];

    public function scopeBuscar($query, $buscar){
		return $query->where(DB::raw("CONCAT(nombre_rol,' ',privilegios)"), "LIKE", '%' .$buscar. '%');
	}
}
