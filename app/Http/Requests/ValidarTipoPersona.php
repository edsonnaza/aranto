<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarTipoPersona extends FormRequest
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
        if ($this->route('id')) {
            return [
                'nombre_tipopersona' => 'required|max:50|unique:tipo_persona,nombre_tipopersona,' . $this->route('id'),
                
               
              
            ];
        } else {
            return [
                'nombre_tipopersona' => 'required|max:50|unique:tipo_persona,nombre_tipopersona,' . $this->route('id'),
                
            ];
        }
    }
}
