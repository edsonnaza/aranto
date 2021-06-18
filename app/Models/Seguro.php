<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PrecioProductos;
use App\Models\Unidad;


class Seguro extends Model
{
    protected $table = "seguros";
    protected $fillable = ['nombre_seguro','descripcion', 'activo', 'sede_id'];


    public function PrecioProductoSeguros()
    {
            return $this->belongsTo(PrecioProductos::class,'id_seguro')->get();
    }
   
 
   
}

