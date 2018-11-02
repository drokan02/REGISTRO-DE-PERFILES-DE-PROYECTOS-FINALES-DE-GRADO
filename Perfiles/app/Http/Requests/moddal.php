<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 
class moddal extends FormRequest
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
        if($ruta == 'almacenar' || $ruta == 'modifcarModalidad'){
       
            return [
                'codigo_mod'=> ['required','alpha_num','min:2','max:5', Rule::unique( 'codigo_mod')->ignore($this->{'id'})],
                'nombre_mod'=> ['required','regex:/^[\pL\s]+$/u','min:3',Rule::unique('nombre_mod')->ignore($this->{'id'})],
                'descripcion_mod'=> 'nullable|min:20|max:255',
            ];

        }else{
            return [
                'codigo_mod'=> 'required|alpha_num|min:2|max:5|unique:codigo_mod',
                'nombre_mod'=> 'required|regex:/^[\pL\s]+$/u|min:3|unique:nombre_mod',
                'descripcion_mod'=> 'nullable|min:20|max:255',
            ];
        }
        
    }

    public function messages()
    {
        global $tipo;
        $ruta = $this->route()->getName();
        if( $ruta == 'almacenar' || $ruta == 'modifcarModalidad'){
            $tipo = 'Modal';
        }else{
            $tipo = '';
        }
        return [
            'codigo_mod.required' => 'no ingreso el codigo del '.$tipo,
            'codigo_mod.unique'   => 'ese codigo ya esta siendo usado',
            'nombre_mod.required' => 'no ingreso el nombre del '.$tipo,
            'nombre_mod.regex' => 'solo se permiten espacios y letras en el nombre',
            'nombre_mod.unique'   => 'esa '.$tipo.' ya se encuentra registrada',
            'descripcion_mod.min' => 'minimo numero de caracteres de la descripcion es de 20 o nada',
        ];
    }
}