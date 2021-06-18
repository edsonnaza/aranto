<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarGenero extends FormRequest
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
        if ($this->route('id')) {
            return [
                'nombre_genero' => 'required|max:50|unique:genero,nombre_genero,' . $this->route('id'),
                'genero' => 'required|genero|max:2|unique:genero,genero,' . $this->route('id'),
                
               
              
            ];
        } else {
            return [
                'nombre_genero' => 'required|max:50|unique:genero,nombre_genero,' . $this->route('id'),
                'genero' => 'required|genero|max:2|unique:genero,genero,' . $this->route('id'),
                
            ];
        }
    }
}
