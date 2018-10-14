<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
        if($ruta == 'almacenarDocente'){
            return [
                'nombre_prof'   => 'required|regex:/^[\pL\s]+$/u|min:3',
                'ap_pa_prof'    => 'required|alpha|min:3',
                'ap_ma_prof'    => 'required|alpha|min:3',
                'ci_prof'       => 'required|numeric|digits_between:6,8|unique:profesionales,ci_prof',
                'telef_prof'    => 'required|numeric|digits_between:7,8|unique:profesionales,telef_prof',
                'correo_prof'   => 'email|min:8|unique:profesionales,correo_prof',
                'direc_prof'    => 'min:7',
                'codigo_sis'    => 'required|numeric|digits_between:6,10|unique:profesionales,ci_prof',
                'carga_horaria' => 'required',
                'titulo_id'     => 'required',
                'area_id'       => 'required',

            ];
        }else{
            $aux = $this->{'docente'};
            $docente= $aux->toArray();
            return [
                'nombre_prof'   => ['required','regex:/^[\pL\s]+$/u','min:3'],
                'ap_pa_prof'    => ['required','alpha','min:3'],
                'ap_ma_prof'    => ['required','alpha','min:3'],
                'ci_prof'       => ['required','numeric','digits_between:6,8',Rule::unique('profesionales', 'ci_prof')->ignore($docente['profesional_id'])],
                'telef_prof'    => ['required','numeric','digits_between:7,8',Rule::unique('profesionales', 'telef_prof')->ignore($docente['profesional_id'])],
                'correo_prof'   => ['email',Rule::unique('profesionales', 'correo_prof')->ignore($docente['profesional_id'])],
                'direc_prof'    => 'min:7',
                'codigo_sis'    => 'required|numeric|digits_between:6,10|unique:profesionales,ci_prof',
                'carga_horaria' => 'required',
                'titulo_id'     => 'required',
                'area_id'       => 'required',
            ];
        }
        
    }

    public function messages()
    {
        return [
            'nombre_prof.required'      => 'No ingreso el nombre ',
            'nombre_prof.regex'         => 'El Nombre solo puede tener espacios y letras',
            'nombre_prof.min'           => 'El Nombre debe tener almenos 3 caracteres',
            'ap_pa_prof.required'       => 'No ingreso el Apellido Paterno',
            'ap_pa_prof.regex'          => 'El Apellido Paterno solo permite letras',
            'ap_pa_prof.min'            => 'El Apellido Paterno debe tener al menos 3 caracteres',
            'ap_ma_prof.required'       => 'No ingreso el Apellido Materno',
            'ap_ma_prof.regex'          => 'El Apellido Materno solo permite letras',
            'ap_ma_prof.min'            => 'El Apellido Materno debe tener almenos 3 caracteres',
            'ci_prof.required'          => 'No ingreso el C.I.',
            'ci_prof.numeric'           => 'La C.I solo puede tener numeros',
            'ci_prof.digits_between'    => 'La C.I debe tener min:6 y max:8 digitos',
            'ci_prof.unique'            => 'Ya existe un Docente registrado con esa C.I',
            'telef_prof.required'       => 'No ingreso el Telefono',
            'telef_prof.numeric'        => 'El telefono solo puede tener numeros',
            'telef_prof.digits_between' => 'El telefono debe tener  min:7 y max:8 digitos',
            'telef_prof.unique'         => 'Ya existe un Docente registrado con ese numero telf',
            'correo_prof.email'         => 'El correo ingresado no es valido',
            'correo_prof.unique'        => 'Ya existe un Docente registrado con ese correo',
            'direc_prof.unique'         => 'La direccion debe tener almenos 7 caracteres',
            'titulo_id.unique'          => 'debe seleccionar un Titulo',
            'titulo_id.unique'          => 'debe seleccionar una Area',
            'codigo_sis.required'       => 'No ingreso el Codigo SIS',
            'codigo_sis.numeric'        => 'El Codigo SIS solo puede tener numeros',
            'codigo_sis.digits_between' => 'El Codigo SIS debe tener min:6 y max:10 digitos',
            'codigo_sis.unique'         => 'Ya existe un Docente registrado con esa C.I',
            'carga_horaria.required'    => 'No selecciono la Carga horaria',
           
        ];
    }
}
