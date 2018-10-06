<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class Tutor extends Authenticatable
{
    use Notifiable;
    protected $table = 'profesional';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ci_prof','nombre_prof', 'ap_ap_prof','ap_ma_prof','correo_prof','telef_prof','titulo_prof','direc_prof','perfil_prof'
    ];

    
}