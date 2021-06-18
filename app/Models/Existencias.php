<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;
use App\Models\Unidad;
use App\Models\PrecioProductos;
use App\Models\Seguro;

class Existencias extends Model
{
     protected $table = "existencias";
     protected $fillable = ['id_unidad', 'id_producto', 'cantidad_minima','precio_costo','precio_venta','cantidad','sede_id'];

    public function ProductosXUnidad()
    {
            return $this->hasOne(Productos::class,'id')->get();
    }

     public function PreciosXSeguro()
    {
            return $this->has(PrecioProductos::class,'id_producto')->get();
    }

}
