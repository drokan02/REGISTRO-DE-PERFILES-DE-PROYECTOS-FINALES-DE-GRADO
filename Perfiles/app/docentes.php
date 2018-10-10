<?php

namespace App;
///\Illuminate\Database\Eloquent\Relations\BelongsTo
use Illuminate\Database\Eloquent\Model;
use App\Profesional;
use DB;

class docentes extends Model
{
    protected $table='docente';
    protected $fillable = [
        
        'codigo_sis',
        'carga_horaria',
         'profesional_id'
        
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
    public function Profesional()
    {
        return $this->belongsTo(Profesional::class);
    }
   public function scopeDocentes($query){
        return $query->whereNull('id');
    }
    public function esAdmin(){
        return $this->id==1;
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
