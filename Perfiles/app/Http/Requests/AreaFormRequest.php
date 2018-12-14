<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 
class AreaFormRequest extends FormRequest
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
        if($ruta == 'modificarArea' || 'modificarSubarea'){
       
            return [
                'codigo'=> ['required','alpha_num','min:2','max:8', Rule::unique('area', 'codigo')->ignore($this->{'id'})],
                'nombre'=> ['required','regex:/^[\pL\s]+$/u','min:3',Rule::unique('area', 'nombre')->ignore($this->{'id'})],
                'descripcion'=> 'nullable|min:20|max:500',
            ];

        }else{
            return [
                'codigo'=> 'required|alpha_num|min:2|max:5|unique:area,codigo',
                'nombre'=> 'required|regex:/^[\pL\s]+$/u|min:3|unique:area,nombre',
                'descripcion'=> 'nullable|min:6|max:500',
            ];
        }
        
    }

    public function messages()
    {
        global $tipo;
        $ruta = $this->route()->getName();
        if( $ruta == 'almacenarArea' || $ruta == 'modifcarArea'){
            $tipo = 'Area';
        }else{
            $tipo = 'SubArea';
        }
        return [
            'codigo.required' => 'no ingreso el código del '.$tipo,
            'codigo.unique'   => 'ese código ya esta siendo usado',
            'nombre.required' => 'no ingreso el nombre del '.$tipo,
            'nombre.regex' => 'solo se permiten espacios y letras en el nombre',
            'nombre.unique'   => 'esa '.$tipo.' ya se encuentra registrada',
            'descripcion.min' => 'La cantidad mínima de letras para descripcion es de 6 letras',
            'descripcion.max' => 'La cantidad máxima de letras para descricion es de 500 letras',


        ];
    }
}
