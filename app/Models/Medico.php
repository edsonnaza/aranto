<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Persona;
use App\Sede;
use App\Models\Especialidad;
use App\Models\Seguridad\Usuario;

class Medico extends Model
{
    protected $table = "medicos";
    protected $fillable = ['medico_nombre', 'id_persona','registro_profesional','id_especialidad','sede_id'];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
    public function sede()
    {
        return $this->hasOne(Sede::class, 'sede_id');
    }
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'id_especialidad');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

  
}
