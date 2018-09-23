<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    protected $fillable = [
        'nombre_rol','privilegios'
    ];
<<<<<<< HEAD

    public function scopeBuscar($query, $buscar){
		return $query->where(DB::raw("CONCAT(nombre_rol,' ',privilegios)"), "LIKE", '%' .$buscar. '%');
	}
=======
    public function user(){
        return $this->hasMany(User::class);
    }
>>>>>>> fd79d5fbf20f8ef1e3701a67325406221af6feb9
}
