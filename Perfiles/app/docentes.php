<?php

namespace App;
///\Illuminate\Database\Eloquent\Relations\BelongsTo
use Illuminate\Database\Eloquent\Model;
use App\Profesional;

class docentes extends Model
{
    protected $table='docente';
    protected $fillable = [
        
        'profesional_id',
        'carga_horaria',
         'codigo_sis'
    ];
    /* public  function profesional(){
         return $this->belongsTO('Profesional');
    }
    public function scopeBuscarProfesional($query,$name){
        if(trim($name)!="")
        {
            $query->where(\DB::raw("CONCAT(nombre_prof,'',ap_pa_prof,'',ap_ma_prof)"),"LIKE","$name%");
        }
    }
    */
   public function scopeDocentes($query){
        return $query->whereNull('codigo_sis');
    }

   

   

    public function scopeBuscarDocentes($query, $buscar){
        if($buscar){
            return $query->whereNull('codigo_sis')
                        ->where(DB::raw("CONCAT(,'profesional_id,' ',carga_horaria)"), "LIKE", "%$buscar%");
        }else{
            return $query->whereNull('codigo_sis');
        }
    }
}
