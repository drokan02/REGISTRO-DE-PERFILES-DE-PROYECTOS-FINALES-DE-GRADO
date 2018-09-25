<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
	protected $table = 'modalidad';
	protected $primaryKey = 'id';
	protected $fillable = [
		'codigo_mod',
		'nombre_mod',
		'descripsion_mod'
		
	]
}