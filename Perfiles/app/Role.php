<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nombre_rol','privilegios'
    ];
    public function user(){
        return $this->hasMany(User::class);
    }
}
