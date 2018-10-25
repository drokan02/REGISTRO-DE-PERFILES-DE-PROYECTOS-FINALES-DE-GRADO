<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'nombres', 'email', 'user_name', 'password', 'telefono', 'carrera_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function perfil(){
        return $this->hasOne(Perfil::class);
    }
    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }
    public function usuario(){
        return $this->belongsToMany(User::class);
    }
}
