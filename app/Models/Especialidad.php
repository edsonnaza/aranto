<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidad';
    protected $fillable = ['id', 'nombre_especialidad','activo' ,'sede_id'];

    public function medicos()
    {
        return $this->hasMany(Medico::class,'id');
    }
}
