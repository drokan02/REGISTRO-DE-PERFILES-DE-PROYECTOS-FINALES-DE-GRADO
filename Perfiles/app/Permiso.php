<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table='permiso';
    protected $fillable = ['name', 'descripcion'];
  
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
