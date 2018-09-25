<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    protected $fillable = [
        'nombre_rol','privilegios'
    ];


    public function user(){
        return $this->belongsToMany(User::class,'asignacion_rol_user');
    }

}
