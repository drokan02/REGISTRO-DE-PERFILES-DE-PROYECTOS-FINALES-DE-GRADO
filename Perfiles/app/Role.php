<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'nombre_rol','privilegios'
    ];

    //public function user(){
      //  return $this->hasMany(User::class);
    //}
    public function users(){
        return $this->belongsToMany(User::class,'asignacion_rol_user');
    }
    public function scopeName($query,$nombre_rol){
        if (trim($nombre_rol) != ""){
            $query->where(DB::raw("CONCAT(privilegios,' ',nombre_rol)"),'like',"%$nombre_rol%");

        }
    }

}
