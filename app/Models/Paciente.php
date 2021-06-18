<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use app\Persona;
use app\Sede;

class Paciente extends Model
{
    protected $table = "pacientes";
    protected $fillable = ['paciente_nombre', 'id_persona','sede_id'];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
    public function sede()
    {
        return $this->hasOne(Sede::class, 'id');
    }

    
}
