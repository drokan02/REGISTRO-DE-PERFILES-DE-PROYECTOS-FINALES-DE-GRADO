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
        'profesional_id'
        
    ];
   
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

    public function scopeBuscarProfesional($query,$buscar){
        if($buscar)
            {
                $query->where(\DB::raw("CONCAT(nombre_prof,'',ap_pa_prof,'',ap_ma_prof)"),"LIKE","$buscar%");
            }
        else{
            return null;
        }
   
    }
    public function scopeBuscarDocentes($query, $buscar){
        if($buscar){
            return $query->where(DB::raw("CONCAT(codigo_sis,' ',carga_horaria,'',profesional_id)"), "LIKE", "%$buscar%");
        }else{
            return null;
        }
    }
}
