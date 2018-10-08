<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 
use Validator;
use App\docentes;
use DB;
class DocenteFormRequest extends FormRequest
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
                'codigo_sis'=> ['required','alpha_num','min:2','max:9', Rule::unique('docente', 'codigo_sis')->ignore($this->{'id'})],
                'carga_horaria'=> ['required','regex:/^[\pL\s]+$/u','min:3',Rule::unique('docente', 'carga_horaria')->ignore($this->{'id'})],
                
            ];

        }else{
            return [
                'codigo_sis'=> 'required|alpha_num|min:2|max:9|unique:docentes,codigo_sis',
                'carga_horaria'=> 'required|regex:/^[\pL\s]+$/u|min:3|unique:docentes,carga_horaria',
               
            ];
        }
    }
    public function messages()
    {
        global $tipo;
        $ruta = $this->route()->getName();
       if(  $ruta == 'almacenarDocente' || $ruta == 'modifcarDocente'  ){
            
            $tipo = 'docentes';
       // }else{
          //  $tipo = 'SubArea';
      //  }
        return [
            'codigo_sis.required' => 'no ingreso el codigo sis del '.$tipo,
            'codigo.unique'   => 'ese codigo sis ya esta siendo usado',
            'carga_horaria.required' => 'no ingreso la carga horaria del '.$tipo,
            'carga_horaria.regex' => 'solo se permiten espacios y letras en la carga horaria',
           // 'nombre.unique'   => 'esa '.$tipo.' ya se encuentra registrada',
        
        ];
    }
}
}