<?php

namespace App\Models;
use App\Persona;
use App\medico;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table = 'nacionalidad';
    protected $fillable = ['nombre_nacionalidad'];

    public function medicos()
    {
        return $this->hasMany(Medico::class,'id');
    }
    public function personas()
    {
        return $this->hasMany(Persona::class,'id');
    }
}
