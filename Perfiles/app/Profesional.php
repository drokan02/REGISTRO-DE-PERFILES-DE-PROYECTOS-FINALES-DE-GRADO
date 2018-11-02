<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Docente;
use App\Titulo;


class Profesional extends Model
{
     protected $table = 'profesional';
     protected $fillable = [
        'ci_prof',
        'nombre_prof', 
        'ap_pa_prof',
        'ap_ma_prof',
        'correo_prof',
        'telef_prof',
        'direc_prof',
        'perfil_prof',
        'titulo_id',
        'carrera_id'
         ];


    public function perfiles()
    {
        return $this->hasMany(Perfil::class);    
    }

    public function docente()
    {
        return $this->hasOne(Docente::class,'profesional_id');    
    }

    public function areas(){
        return $this->belongsToMany(Area::class,'profesional_area');  
    }

    public function titulo(){
        return $this->belongsTo(Titulo::class);
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }

    public function scopeBuscarProfesional($query,$buscar){
        if($buscar){
            return $query->where(DB::raw("CONCAT(nombre_prof,' ',ap_pa_prof,' ',ap_ma_prof)"), "LIKE", "%$buscar%");
        }else {
            return $query;
        }
    }

    public function scopePorCarrera($query,$carrera_id){
        return $query->where('carrera_id',$carrera_id);
    }
}
