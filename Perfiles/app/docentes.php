<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docentes extends Model
{
    protected $fillable = [
        'id','nombre','apell_paterno', 'apell_materno', 'ci','correo','carrera','area'
    ];
}
