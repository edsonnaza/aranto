<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPaciente extends FormRequest
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
     *  protected $fillable = ['persona_nombre', 'persona_apellido', 'full_name_persona','id_tipodni','numero_dni','email',
     * 'facebook','nro_mobil','nro_telefono' ,'genero',
     * 'id_clasificacion','id_nacionalidad','fecha_nacimiento', 'id_tipopersona','id_estadocivil','id_profesional','id_seguro','foto_persona'];

     * @return array
     */
    public function rules()
    {
        if ($this->route('id')) {
            return [
               // 'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
               
                'email' => 'nullable|max:100|unique:personas,email' . $this->route('id'),
                'foto_up' => 'nullable|image|max:1024',
              //  'persona_nombre' => 'required|max:100',
             //   'persona_apellido' => 'required|max:100',
               // 'id_tipodni' => 'required',
               // 'nro_mobil' => 'required|min:9',
               // 'genero' => 'required',
               //'id_clasificacion' => 'required',
               // 'id_nacionalidad' => 'required',
                //'fecha_nacimiento' => 'required',
                'genero' => 'required',
               // 'id_tipopersona' => 'required',
               // 'id_estadocivil' => 'required',
               // 'id_profesion' => 'required',
                'id_seguro' => 'required'
               
                
            ];
        } else {
            return [
                'email' => 'nullable|max:100|unique:personas,email,' . $this->route('id'),
             //   'persona_nombre' => 'required|max:100',
             //   'persona_apellido' => 'required|max:100',
                'foto_up.max' => 'La foto no puede tener un peso mayor a 1MB',
                'id_tipodni' => 'required',
                'nro_mobil' => 'required|min:9',
             //   'genero' => 'required',
            //    'id_clasificacion' => 'required',
              //  'id_nacionalidad' => 'required',
                //'fecha_nacimiento' => 'required',
                'genero' => 'required',
             //   'id_tipopersona' => 'required',
              //  'id_estadocivil' => 'required',
                //'id_profesion' => 'required',
                'id_seguro' => 'required'
            ];
        }
    }
}
