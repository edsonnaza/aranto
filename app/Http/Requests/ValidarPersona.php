<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPersona extends FormRequest
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
               // 'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
               
                'email' => 'max:100|unique:personas,email,persona_nombre,persona_apellido,numero_dni,' . $this->route('id'),
                'foto_up' => 'nullable|image|max:1024',
                'persona_nombre' => 'required|max:100',
                'persona_apellido' => 'required|max:100',
                'id_usuario'=>'unique:personas,email,'.$this->route('id'),
              //  'id_tipodni' => 'required',
              //  'nro_mobil' => 'required|min:9',
               // 'genero' => 'required',
              //  'id_clasificacion' => 'required',
               // 'id_nacionalidad' => 'required',
                //'fecha_nacimiento' => 'required',
               // 'genero' => 'required',
               // 'id_tipopersona' => 'required',
               // 'id_estadocivil' => 'required',
               // 'id_profesion' => 'required',
               // 'id_seguro' => 'required'
                
               
                
            ];
        } else {
            return [
                'email' => 'max:100|unique:personas,email,' . $this->route('id'),
                'persona_nombre' => 'required|max:100',
                'persona_apellido' => 'required|max:100',
                'foto_up.max' => 'La foto no puede tener un peso mayor a 1 MB',
                'id_usuario'=>'unique:personas,email,'.$this->route('id'),
              //  'id_tipodni' => 'required',
               // 'nro_mobil' => 'required|min:9',
               // 'genero' => 'required',
               // 'id_clasificacion' => 'required',
              //  'id_nacionalidad' => 'required',
                //'fecha_nacimiento' => 'required',
              
               // 'id_tipopersona' => 'required',
              //  'id_estadocivil' => 'required',
              //  'id_profesion' => 'required',
              //  'id_seguro' => 'required'
            ];
        }
    }
}
