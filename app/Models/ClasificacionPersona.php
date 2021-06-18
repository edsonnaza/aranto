<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClasificacionPersona;
use App\Models\Clasificacion;

class ClasificacionPersona extends Model
{
    protected $table = "clasificacion_persona";
    protected $fillable = ['id_clasificacion','id_persona'];

//public $timestamps = false;

     /*public function ClasificacionPersona()
    {
        return $this->belongsToMany(Clasificacion::class, 'id_clasificacion');
    }*/
}
