<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarSeguro extends FormRequest
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
                'nombre_seguro' => 'required|max:50|unique:seguros,nombre_seguro,' . $this->route('id'),
                
               
              
            ];
        } else {
            return [
                'nombre_seguro' => 'required|max:50|unique:seguros,nombre_seguro,sede_id,' . $this->route('id'),
                
            ];
        }
    }
}
