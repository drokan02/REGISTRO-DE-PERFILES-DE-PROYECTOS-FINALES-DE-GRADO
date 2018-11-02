<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Modal;
class PerfilFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $ruta = $this->route()->getName();
        if($ruta == "modificarPerfil"){
            //dd($ruta);
            return [
                'tutor_id'     => 'required',
                'objetivo_gen' => 'required',
                'objetivo_esp' => 'required',
                'descripcion'  => 'required'
            ]; 
        }else{
            $aux = $this->toArray();
        $id  = $aux['modalidad_id'];
        $modalidad = Modal::where('id',$id)->get();
        $aux = $modalidad->toArray()[0]['nombre_mod'];
        if( $aux == "trabajo dirigido"){
            return [
                'docente_id'   => 'required',
                'tutor_id'     => 'required',
                'area_id'      => 'required',
                'titulo'       => 'required',
                'institucion'  => 'required',
                'objetivo_gen' => 'required',
                'objetivo_esp' => 'required',
                'descripcion'  => 'required'
            ];       
        }else if($aux == "adscripcion"){
            return [
                'docente_id'   => 'required',
                'tutor_id'     => 'required',
                'area_id'      => 'required',
                'titulo'       => 'required',
                'sec_trabajo'  => 'required',
                'objetivo_gen' => 'required',
                'objetivo_esp' => 'required',
                'descripcion'  => 'required'
            ];   
        }else{
            return [
                'docente_id'   => 'required',
                'tutor_id'     => 'required',
                'area_id'      => 'required',
                'titulo'       => 'required',
                'objetivo_gen' => 'required',
                'objetivo_esp' => 'required',
                'descripcion'  => 'required'
            ];   
        }
    
    
        }
        
    }

    public function messages()
    {
        return [
            'docente_id.required'   => 'debe seleccionar un Docente de Materia',
            'tutor_id.required'     => 'debe seleccionar un Tutor para su perfil',
            'area_id.required'      => 'debe seleccionar un Area de especializacion',
            'subarea_id.required'   => 'debe seleccionar un Subrea de especializacio',
            'titulo.required'       => 'debe ingresar el Titulo',
            'institucion.required'  => 'debe ingresar el nombre de la Institucion ',
            'sec_trabajo.required'  => 'debe ingresar la seccion de Trabajo',
            'objetivo_gen.required' => 'debe ingresar el Objetivo General',
            'objetivo_esp.required' => 'debe ingresar el objetivo Espesifico',
            'descripcion.required'  => 'debe ingresar una Descripcion',
            'titulo.unique'         => 'ya hay un Perfil registrado con ese Titulo'
        ];
    }
}
