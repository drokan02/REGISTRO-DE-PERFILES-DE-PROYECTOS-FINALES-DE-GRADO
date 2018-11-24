<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
	//use Notifiable;
	public $timestamps=true;



    protected $table = 'titulo';
    
    protected $fillable = [
        'id', 'nombre'
    ];

    public function profecionales()
    {
        return $this->hasMany(Profesional::class);    
    }
}
