<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class fechas extends Model
{
     protected $fillable=[
    	'titulo',
    	'fechainicio',
        'fechafin'
    ];
    public $timestamps=false;
    protected $table='fechas';
}
