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
        'estado'
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
            return $query->whereHas('estudiantes', function($query) use ($buscar){
                return $query->where(DB::raw("CONCAT(titulo,' ',descripcion,' ',nombres)"), "LIKE", "%$buscar%");
            });
        }
        
    }

    public function scopePeriodo($query,$periodo){
        if($periodo){
            if($periodo == 1){
                return $query->whereMonth('fecha_ini','<=',6);
            }else{
                return $query->whereMonth('fecha_ini','>',6);
            }
        }
        
    }

    public function scopeAnios($query){

            return $query->select(DB::raw('YEAR(fecha_ini) as year') )->distinct();
        
    }

    public function scopeAnio($query,$anio){
        if($anio ){
            return $query->whereYear('fecha_ini',$anio);
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
            return $query->where('estado','eliminado')->where('estado','!=','Guardado');
        }else{
            return $query->where('estado','!=','eliminado')->where('estado','!=','Guardado')->orWhereNull('estado');
        }
    }

    public function scopePerfilesTutor($query,$tutor_id){
        if($tutor_id){
            return $query->where('estado','!=','eliminado')->where('estado','!=','Guardado')
                            ->whereHas('tutor', function($query) use ($tutor_id){
                            return $query->where('profesional_id',$tutor_id);
                            });
         }
    }

   
    public function scopePerfilEstudiante($query,$estudiante_id){
        return $query->where('estado','Guardado')
                     ->whereHas('estudiantes', function($query) use ($estudiante_id){
                        return $query->where('estudiante_id',$estudiante_id);
                     });
    }

    
}
