<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\TipoDNI;
use App\Models\Medico;
use App\Models\ClasificacionPersona;
use App\Models\Clasificacion;

class Persona extends Model
{
    protected $table = "personas";
    protected $fillable = ['persona_nombre', 'persona_apellido', 'full_name_persona', 'id_tipodni', 'numero_dni', 'email', 'facebook', 'nro_mobil', 'nro_telefono', 'genero',  'id_nacionalidad', 'fecha_nacimiento', 'id_tipopersona', 'id_estadocivil', 'id_profesion', 'id_seguro', 'foto_persona','ruc','id_especialidad','id_usuario'];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id');
    }

    public function medico()
    {
        return $this->hasOne(Medico::class, 'id');
    }
    public function dni()
    {
        return $this->hasOne(TipoDni::class, 'id');
    }
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id');
    }

      

     public function Clasificacion()
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion');
    }

     public function ClasificacionPaciente()
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion')->wherePivot('id_clasificacion',1);
    }

      public function ClasificacionMedico()
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion')->wherePivot('id_clasificacion',2);
    }
    
      public function ClasificacionProveedor()
    {
        return $this->belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion')->wherePivot('id_clasificacion',4);
    }


    public static function setFoto($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/personas/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/personas/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }
}
