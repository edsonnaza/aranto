<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarEspecialidad extends FormRequest
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
                'nombre_especialidad' => 'required|max:100|unique:especialidad,nombre_especialidad,' . $this->route('id'),
                
               
              
            ];
        } else {
            return [
                'nombre_especialidad' => 'required|max:100|unique:especialidad,nombre_especialidad,' . $this->route('id'),
                
            ];
        }
    }
}
