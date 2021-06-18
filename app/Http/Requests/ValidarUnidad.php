<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarUnidad extends FormRequest
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
        'nombre_unidad' => 'required|max:50|unique:unidad,nombre_unidad,' . $this->route('id'),

    ];
} else {
    return [
        'nombre_unidad' => 'required|max:50|unique:unidad,nombre_unidad,sede_id,' . $this->route('id'),

    ];
}

    }
}
