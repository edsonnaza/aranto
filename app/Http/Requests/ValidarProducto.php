<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarProducto extends FormRequest
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
        //'producto_nombre' => 'required|max:192|unique:productos,producto_nombre,' . $this->route('id'),
          'producto_nombre' => 'required|max:192|unique:productos,producto_nombre,' . $this->route('id'),

    ];
} else {
    return [
        'producto_nombre' => 'required|max:192,' . $this->route('id'),

    ];
}

    }
}
