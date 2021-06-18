<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarSede extends FormRequest
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
                'nombre_sede' => 'required|max:50|unique:sedes,nombre_sede,' . $this->route('id'),
                'direccion' => 'required|max:190',
                'email' => 'required|email|max:100|unique:sedes,email,' . $this->route('id'),
                'ruc' => 'nullable|min:5',
                'telefono' => 'nullable|required_with:min:5',
                
                'foto_up' => 'nullable|image|max:1024'
            ];
        } else {
            return [
                'nombre_sede' => 'required|max:50|unique:sedes,nombre_sede,' . $this->route('id'),
                'direccion' => 'required|max:190',
                'email' => 'required|email|max:100|unique:sedes,email,' . $this->route('id'),
                'ruc' => 'nullable|required_with:min:5',
                'telefono' => 'nullable|required_with:min:5',       
                'foto_up.max' => 'La foto no puede tener un peso mayor a 1MB'
            ];
        }
    
    }
}
