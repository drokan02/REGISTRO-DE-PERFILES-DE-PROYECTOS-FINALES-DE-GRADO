<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subarea extends Model
{
    protected $table='area';
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'area_id',
        'carrera_id'
    ];

    public function area(){
        return $this->belongsTo(Area::class,'area_id');
    }

}