<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarCategoriaPadre extends FormRequest
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
        'nombre_categoriapadre' => 'required|max:50|unique:categoriapadre,nombre_categoriapadre,' . $this->route('id'),
         
    ];
} else {
    return [
        'nombre_categoriapadre' => 'required|max:50|unique:categoriapadre,nombre_categoriapadre,' . $this->route('id'),
        
    ];
}

    }
}
