<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Persona;


class TipoPersona extends Model
{
    protected $table = 'tipo_persona';
    protected $fillable = ['id', 'nombre_tipopersona','activo' ,'sede_id'];

    public function personas()
    {
        return $this->hasMany(Persona::class,'id');
    }


}
