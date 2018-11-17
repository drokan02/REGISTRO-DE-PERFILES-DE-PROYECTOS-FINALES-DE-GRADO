<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
<<<<<<< HEAD
    protected $table='permiso';
=======
    protected $table='permisos';
>>>>>>> 76b5ecd54646cae76a97e7238c5bd2a2cf2b30d5
    protected $fillable = ['name', 'descripcion'];
  
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
