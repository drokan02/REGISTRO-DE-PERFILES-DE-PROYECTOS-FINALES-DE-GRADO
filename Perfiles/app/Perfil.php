<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Perfil extends Model
{
    protected $table='perfil';

    protected $fillable = [
        'modalidad_id',
        'docente_id',
        'director_id',
        'area_id',
        'subarea_id',
        'titulo',
        'institucion',
        'encargado',
        'objetivo_gen',
        'objetivo_esp',
        'descripcion',
        'trabajo_conjunto',
        'cambio_tema',
        'fecha_ini',
        'fecha_fin',
        'eliminado'
    ];

    public function gestion()
    {
        return $this->belongsTo(Gestion::class);
    }
    public function modalidad()
    {
        return $this->belongsTo(Modal::class,'modalidad_id');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class,'estudiante_perfil');  
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class,'docente_id');
    }

    public function director(){
        return $this->belongsTo(Docente::class,'director_id');
    }

    public function tutor(){
        return $this->belongsToMany(Profesional::class,'perfil_tutor');
    }
    public function area(){    
        return $this->belongsTo(Area::class,'area_id');
    }

    public function subarea(){    
        return $this->belongsTo(Area::class,'subarea_id');
    }

    public function scopeBuscar($query,$buscar){
        if($buscar){
            return $query->where(DB::raw("CONCAT(titulo,' ',descripcion)"), "LIKE", "%$buscar%");
        }
        
    }

    public function scopePeriodo($query,$periodo){
        if($periodo){
            if($periodo == 1){
                return $query->whereMonth('fecha_ini','<',7);
            }else{
                return $query->whereMonth('fecha_ini','>=',7);
            }
        }
        
    }

    public function scopeAnio($query,$anio){
        if($anio){
            return $query->whereYear('fecha_ini','==',$anio);
        }
    }

    public function scopeModalidadP($query,$modalidad_id){
        if($modalidad_id){
            return $query->whereHas('modalidad', function($query) use ($modalidad_id){
                                return $query->where('id',$modalidad_id);
                           });
        }
    }

    public function scopeEliminado($query,$eliminados){
        if ($eliminados) {
            return $query->where('eliminado','si');
        }else{
            return $query->whereNull('eliminado');
        }
    }
}
