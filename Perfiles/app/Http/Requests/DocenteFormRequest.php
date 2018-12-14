<?php

namespace App\Http\Requests;

use App\Docente;
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
                'ci_prof'       => 'required|numeric|digits_between:6,8|unique:profesional,ci_prof',
                'telef_prof'    => 'required|numeric|digits_between:7,8|unique:profesional,telef_prof',
                'correo_prof'   => ['email','unique:profesional,correo_prof','unique:users,email','regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u'],
                'direc_prof'    => 'min:7',
                'codigo_sis'    => 'required|numeric|digits_between:6,10|unique:docente,codigo_sis',
                'director_carrera' => 'unique:docente,director_carrera',
                'cargahoraria_id' => 'required',
                'titulo_id'     => 'required',
                'area_id'       => 'required',
                'carrera_id'    => 'required',
                'password'      => 'required'

            ];
        }else{
            $aux = $this->{'docente'};
            $docente= $aux->toArray();
            $doc=Docente::query()->where('id',$docente['id'])->get()->first();
            return [
                'nombre_prof'   => ['required','regex:/^[\pL\s]+$/u','min:3'],
                'ap_pa_prof'    => ['required','alpha','min:3'],
                'ap_ma_prof'    => ['required','alpha','min:3'],
                'ci_prof'       => ['required','numeric','digits_between:6,8',Rule::unique('profesional', 'ci_prof')->ignore($docente['profesional_id'])],
                'telef_prof'    => ['required','numeric','digits_between:7,8',Rule::unique('profesional', 'telef_prof')->ignore($docente['profesional_id'])],
                'correo_prof'   => ['email',Rule::unique('profesional', 'correo_prof')->ignore($docente['profesional_id']),'regex:/[a-z-_.0-9]+@(gmail|hotmail|yahoo|outlook).(com|es|org)/u',
                                     Rule::unique('users','email')->ignore($doc->usuario()->first()->id)],
                'direc_prof'    => 'min:7',
                'codigo_sis'    => ['required','numeric','digits_between:6,10',Rule::unique('docente','codigo_sis')->ignore($docente['id'])],
                'cargahoraria_id' => 'required',
                'titulo_id'     => 'required',
                'area_id'       => 'required',
                'carrera_id'    => 'required',
            ];
        }
        
    }

    public function messages()
    {
        return [
            'nombre_prof.required'      => 'No ingreso el nombre ',
            'nombre_prof.regex'         => 'El Nombre solo puede tener espacios y letras',
            'nombre_prof.min'           => 'El Nombre debe tener almenas 3 caracteres',
            'ap_pa_prof.required'       => 'No ingreso el Apellido Paterno',
            'ap_pa_prof.alpha'          => 'El Apellido Paterno solo permite letras',
            'ap_pa_prof.min'            => 'El Apellido Paterno debe tener al menos 3 caracteres',
            'ap_ma_prof.required'       => 'No ingreso el Apellido Materno',
            'ap_ma_prof.alpha'          => 'El Apellido Materno solo permite letras',
            'ap_ma_prof.min'            => 'El Apellido Materno debe tener almenos 3 caracteres',
            'ci_prof.required'          => 'No ingreso el C.I.',
            'ci_prof.numeric'           => 'La C.I solo puede tener numeros',
            'ci_prof.digits_between'    => 'La C.I debe tener min:6 y max:8 digitos',
            'ci_prof.unique'            => 'Ya existe un Docente registrado con esa C.I',
            'telef_prof.required'       => 'No ingreso el Teléfono',
            'telef_prof.numeric'        => 'El teléfono solo puede tener numeros',
            'telef_prof.digits_between' => 'El teléfono debe tener  min:7 y max:8 digitos',
            'telef_prof.unique'         => 'Ya existe un Docente registrado con ese numero telf',
            'correo_prof.email'         => 'El correo ingresado no es valido',
            'correo_prof.unique'        => 'Ya existe un Docente registrado con ese correo',
            'correo_prof.min'           => 'El tamaño del correo no es valido',
            'direc_prof.unique'         => 'La dirección debe tener al menos 7 caracteres',
            'titulo_id.unique'          => 'debe seleccionar un Titulo',
            'titulo_id.unique'          => 'debe seleccionar una Área',
            'codigo_sis.required'       => 'No ingreso el Código SIS',
            'codigo_sis.numeric'        => 'El Código SIS solo puede tener numeros',
            'codigo_sis.digits_between' => 'El Código SIS debe tener min:6 y max:10 digitos',
            'codigo_sis.unique'         => 'Ya existe un Docente registrado con ese Codigo SIS',
            'cargahoraria_id.required'  => 'No selecciono una Carga horaria',
            'titulo_id.required'        => 'No selecciono un Titulo',
            'carrera_id.required'       => 'No selecciono una Carrera',
            'area_id.required'          => 'debe seleccionar una Área',
            'director_carrera.unique'   => 'la carrera Seleccionada ya tiene un Director',
            'correo_prof.regex'         => 'El tipo de correo  no es valido'


           
        ];
    }
}
