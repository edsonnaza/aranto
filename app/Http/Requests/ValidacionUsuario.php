<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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
                'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50',
                'email' => 'required|email|max:100|unique:usuario,email,' . $this->route('id'),
                'password' => 'nullable|min:5',
                're_password' => 'nullable|required_with:password|min:5|same:password',
                'rol_id' => 'required|array',
                'id_persona' => 'required',
                'foto_up' => 'nullable|image|max:1024',
               // 'persona_nombre' => 'required|max:100',
               // 'persona_apellido' => 'required|max:100'
            ];
        } else {
            return [
                'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50',
                'email' => 'required|email|max:100|unique:usuario,email,' . $this->route('id'),
                'password' => 'required|min:5',
                're_password' => 'required|min:5|same:password',
                'rol_id' => 'required|array',
                 'id_persona' => 'required',
                'foto_up.max' => 'La foto no puede tener un peso mayor a 1MB',
              //  'persona_nombre' => 'required|max:100',
              //  'persona_apellido' => 'required|max:100'
            ];
        }
    }
}
