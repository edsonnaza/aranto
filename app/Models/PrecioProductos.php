<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;
use App\Models\Seguro;

class PrecioProductos extends Model
{  
      protected $table = "precio_productos";
      protected $fillable = ['id_producto','id_seguro', 'precio_venta','precio_costo', 'sede_id'];

    public function Producto()
    {
        return $this->belongsTo(Productos::class, 'id','id_producto');
    }

     public function PrecioPorSeguro()
    {
        return $this->hasMany(Seguro::class, 'id')->get();
    }


    }
