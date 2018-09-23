<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'codigo'=> 'required|alpha_num|min:2|max:5|unique:areas,codigo',
            'nombre'=> 'required|regex:/^[a-z]+$/i|min:3|unique:areas,nombre',
            'descripcion'=> 'nullable|min:20|max:100',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'no ingreso el codigo del Area',
            'codigo.unique'   => 'ese codigo ya esta siendo usado',
            'nombre.required' => 'no ingreso el nombre del Area',
            'nombre.regex' => 'solo se permiten espacios y letras en el nombre',
            'nombre.unique'   => 'esa aria ya se encuentra registrada',
            'descripcion.min' => 'min numero de caracteres de la descripcion es de 20 o nada',
  
           
        ];
    }
}
