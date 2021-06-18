<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarMedidasBasicas extends FormRequest
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
     * 'nombre_unidad_basica','simbolo','magnitud','descripcion','activo','sede_id'
     * @return array
     */
    public function rules()
    {
        if ($this->route('id')) {
    return [
        'nombre_unidad_basica' => 'required|max:100|unique:medidas,nombre_unidad_basica,' . $this->route('id'),

    ];
} else {
    return [
        'nombre_unidad_basica' => 'required|max:100|unique:medidas,nombre_unidad_basica,' . $this->route('id'),

    ];
}

    }
}
