<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
   protected $table = 'unidad';
    protected $fillable = ['id', 'nombre_unidad','activo' ,'sede_id'];

}
