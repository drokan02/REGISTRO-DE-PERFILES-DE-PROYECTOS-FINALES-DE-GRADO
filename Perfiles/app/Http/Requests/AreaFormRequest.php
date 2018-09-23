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
            'id_area'=>'string',
            'codigo'=> 'required|string|min:1',
            'nombre'=> 'required|string|min:3',
            'descripsion'=> 'required|string|min:3',
        ];
    }
}
