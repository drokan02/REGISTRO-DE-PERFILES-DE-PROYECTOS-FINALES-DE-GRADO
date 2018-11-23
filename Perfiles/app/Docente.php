<?php

namespace App;
///\Illuminate\Database\Eloquent\Relations\BelongsTo
use Illuminate\Database\Eloquent\Model;
use App\Profesional;
use App\CargaHoraria;
use DB;

class Docente extends Model
{
    protected $table='docente';
    protected $fillable = [
        
        'codigo_sis',
        'cargahoraria_id',
        'profesional_id',
        'director_carrera'
        
    ];
   
    public function perfiles()
    {
        return $this->hasMany(Perfil::class);
    }

    public function profesional()
    {
        return $this->belongsTo(Profesional::class);
    }

    public function cargahoraria()
    {
        return $this->belongsTo(CargaHoraria::class);
    }

   public function scopeDocentes($query){
        return $query->whereNull('id');
    }


    public function scopeBuscarDocentes($query, $buscar){
        if($buscar){
            return $query->whereHas('profesional', function ($query) use ( $buscar){
                                $query->where(DB::raw("CONCAT(nombre_prof,' ',ap_pa_prof,' ',ap_ma_prof)"), "LIKE", "%$buscar%");
                    });
        }else{
            return null;
        }
    }

    public function scopePorCarrera($query, $carrera_id){
        if($carrera_id){
            return $query->whereHas('profesional', function ($query) use ( $carrera_id){
                $query->where('carrera_id',$carrera_id);
            });
        }else{
            return null;
        }
    }

    public function scopeDirectorCarrera($query, $carrera_id){

            return $query->where('director_carrera',$carrera_id);
    }
    public function usuario(){
        return $this->belongsToMany(User::class);
    }

}
