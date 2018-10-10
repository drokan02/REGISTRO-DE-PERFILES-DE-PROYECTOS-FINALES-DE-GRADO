<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesionalFormRequest extends FormRequest
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
        if($ruta == 'almacenarProfesional'){
            return [
                'nombre_prof' => 'required|regex:/^[\pL\s]+$/u|min:3',
                'ap_pa_prof'  => 'required|alpha|min:3',
                'ap_ma_prof'  => 'required|alpha|min:3',
                'ci_prof'     => 'required|num|min:5|unique:profesionales,ci_prof',
                'telf_prof'   => 'required|num|min:7|unique:profesionales,telf_prof',
                'correo_prof' => 'email|min:8|unique:profesionales,correo_prof',
                'direc_prof'  => 'min:7',
                'titulo_id'   => 'required',
                'area_id'     => 'required',

            ];
        }else{
            return [
                'nombre_prof' => 'required|regex:/^[\pL\s]+$/u|min:3|'.(Rule::unique('areas', 'codigo')->ignore($this->{'id'})),
                'ap_pa_prof'  => 'required|alpha|min:3',
                'ap_ma_prof'  => 'required|alpha|min:3',
                'ci_prof'     => 'required|num|min:5|unique:profesionales,ci_prof',
                'telf_prof'   => 'required|num|min:7|unique:profesionales,telf_prof',
                'correo_prof' => 'required|email|min:8|unique:profesionales,correo_prof',
                'direc_prof'  => 'min:7',
                'titulo_id'   => 'required',
                'area_id'     => 'required',
            ];
        }
        
    }
}
