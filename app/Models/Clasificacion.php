<?php

namespace App\Models;
use App\Models\Persona;
use App\Models\Medico;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = 'clasificacion';
    protected $fillable = ['nombre_clasificacion' ,'sede_id'];

   /* public function medicos()
    {
        return $this->hasMany(Medico::class,'id');
    }
    public function personas()
    {
        return $this->hasMany(Persona::class,'id');
    }*/
}
