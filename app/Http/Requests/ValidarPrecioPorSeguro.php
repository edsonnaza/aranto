<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPrecioPorSeguro extends FormRequest
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
    {   // protected $table = "precio_productos";
     // protected $fillable = ['id_producto','id_seguro', 'precio_venta','precio_costo', 'sede_id'];
     //  if ($this->route('id')) {
    if ($this->route('id')) {
    return [
        //'id_seguro' => 'required|unique:precio_productos,id_producto,' . $this->route('id')->ignore('id'),
       // 'id_seguro' => ['required', 'id_seguro', Rule::unique('precio_productos')->ignore($precio_preductos->id)],
      // 'id_producto' => 'required|unique:precio_productos,id_seguro,id_producto,'.$this->route('id'),

    ];
} else {
    return [
      //  'nombre_seguro' => 'required|max:50|unique:seguros,nombre_seguro,sede_id,' . $this->route('id'),

    ];
}

//} 

    }
}
