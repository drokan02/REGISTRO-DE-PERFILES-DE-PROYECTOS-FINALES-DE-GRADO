<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
	//use Notifiable;
	public $timestamps=false;



    protected $table = 'titulo';
    
    protected $fillable = [
        'id', 'nombre'
    ];
}
