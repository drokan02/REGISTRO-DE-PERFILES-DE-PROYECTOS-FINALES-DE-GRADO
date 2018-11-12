<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestion';
    protected $fillable = [
        'fecha_ini',
        'fecha_fin',
        'periodo'
    ];

    public function Perfiles(){
        return $this->hasMany(Perfil::class);
    }
     
}
