<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedidasBasicas extends Model
{
     protected $table = "medidas";
    protected $fillable = ['nombre_unidad_basica','simbolo','magnitud','descripcion','activo','sede_id'];
}
