<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docentes extends Model
{
    protected $fillable = [
        
        'profesiona_id',
        'carga_horaria',
         'codigo_sis'
    ];
}
