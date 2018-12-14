<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProfesionalRequest extends FormRequest
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
        if($ruta == 'almacenarProfesional'){
            return [
                'nombre_prof' => 'required|regex:/^[\pL\s]+$/u|min:3',
                'ap_pa_prof'  => 'required|alpha|min:3',
                'ap_ma_prof'  => 'required|alpha|min:3',
                'ci_prof'     => 'required|numeric|digits_between:6,8|unique:profesional,ci_prof',
                'telef_prof'   => 'required|numeric|digits_between:7,8|unique:profesional,telef_prof',
                'correo_prof' => ['email','unique:profesional','correo_prof','regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u'],
                'direc_prof'  => 'min:7',
                'titulo_id'   => 'required',
                'area_id'     => 'required',
                'carrera_id'    => 'required',

            ];
        }else{
            $aux = $this->{'profesional'};
            $prof = $aux->toArray();
            return [
                'nombre_prof' => ['required','regex:/^[\pL\s]+$/u','min:3'],
                'ap_pa_prof'  => ['required','alpha','min:3'],
                'ap_ma_prof'  => ['required','alpha','min:3'],
                'ci_prof'     => ['required','numeric','digits_between:6,10',Rule::unique('profesional', 'ci_prof')->ignore($prof['id'])],
                'telef_prof'   => ['required','numeric','digits_between:7,10',Rule::unique('profesional', 'telef_prof')->ignore($prof['id'])],
                'correo_prof' => ['email','regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u',Rule::unique('profesional', 'correo_prof')->ignore($prof['id'])],
                'direc_prof'  => 'min:7',
                'titulo_id'   => 'required',
                'area_id'     => 'required',
                'carrera_id'    => 'required',
            ];
        }
        
    }

    public function messages()
    {
        return [
            'nombre_prof.required' => 'No ingreso el nombre ',
            'nombre_prof.regex'     => 'El Nombre solo puede tener espacios y letras',
            'nombre_prof.min'      => 'El Nombre debe tener al menos 3 caracteres',
            'ap_pa_prof.required'  => 'No ingreso el Apellido Paterno',
            'ap_pa_prof.alpha'      => 'El Apellido Paterno solo permite letras',
            'ap_pa_prof.min'       => 'El Apellido Paterno debe tener al menos 3 caracteres',
            'ap_ma_prof.required'  => 'No ingreso el Apellido Materno',
            'ap_ma_prof.alpha'      => 'El Apellido Materno solo permite letras',
            'ap_ma_prof.min'       => 'El Apellido Materno debe tener almenas 3 caracteres',
            'ci_prof.required'     => 'No ingreso el C.I.',
            'ci_prof.numeric'      => 'La C.I solo puede tener números',
            'ci_prof.digits_between' => 'La C.I debe tener min:6 y max:10 dígitos',
            'ci_prof.unique'         => 'Ya existe un Profesional registrado con esa C.I',
            'telef_prof.required'   => 'No ingreso el Teléfono',
            'telef_prof.numeric'    => 'El teléfono solo puede tener números',
            'telef_prof.digits_between' => 'El teléfono debe tener  min:7 y max:10 dígitos',
            'telef_prof.unique'     => 'Ya existe un Profesional registrado con ese numero telf',
            'correo_prof.email'    => 'El correo ingresado no es valido',
            'correo_prof.unique'   => 'Ya existe un Profesional registrado con ese correo',
            'direc_prof.unique'    => 'La dirección debe tener al menos 7 caracteres',
            'titulo_id.required'    => 'debe seleccionar un Titulo',
            'area_id.required'    => 'debe seleccionar una Área',
            'carrera_id.required'    => 'debe seleccionar una Carrera',
            'correo_prof.regex'         => 'El tipo de correo  no es valido'


        ];
    }
}
