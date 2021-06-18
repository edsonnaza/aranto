<?php

namespace app\Models;
use app\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class TipoDNI extends Model
{
    protected $table = 'tipodni';
    protected $fillable = ['id', 'nombre_tipodni','activo' ,'sede_id'];

    public function personas()
    {
        return $this->hasMany(Persona::class,'id');
    }
}

   