<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'codigo_sis'=> ['required','alpha_num','min:2','max:5', Rule::unique('areas', 'codigo')->ignore($this->{'id'})],
                'nombre'=> ['required','regex:/^[\pL\s]+$/u','min:3',Rule::unique('areas', 'nombre')->ignore($this->{'id'})],
                'descripcion'=> 'nullable|min:20|max:255',
            ];

        }else{
            return [
                'codigo'=> 'required|alpha_num|min:2|max:5|unique:areas,codigo',
                'nombre'=> 'required|regex:/^[\pL\s]+$/u|min:3|unique:areas,nombre',
                'descripcion'=> 'nullable|min:20|max:255',
            ];
        }
    }
}
