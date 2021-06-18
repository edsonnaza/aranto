<?php

namespace App\Models;
use App\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'profesion';
    protected $fillable = ['nombre_profesion','activo' ,'sede_id'];

    public function personas()
    {
        return $this->hasMany(Persona::class,'id');
    }
}
