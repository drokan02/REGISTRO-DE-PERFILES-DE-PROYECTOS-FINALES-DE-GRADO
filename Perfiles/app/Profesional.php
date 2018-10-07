<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Profesional extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'profesional';
    protected $primaryKey ='id';
    protected $fillable = [
        'id','ci_prof','nombre_prof', 'ap_ap_prof','ap_ma_prof','correo_prof','telef_prof','direc_prof','perfil_prof'
    ];
public function scopeTitulo(){
    return $this->belongsTo('Titulo');
}
public function scopeDocentes(){
    return $this->hasMany('\App\docentes');
}
public function scopeBuscar($query,$name){
    if(trim($name)!="")
        {
            $query->where(\DB::raw("CONCAT(nombre_prof,'',ap_pa_prof,'',ap_ma_prof)"),"LIKE","$name%");
        }
}

    
}