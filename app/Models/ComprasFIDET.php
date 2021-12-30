<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class ComprasFIDET extends Model
{
    use HasFactory;
  

     protected $table = 'comprasfi_det';
     protected $fillable = ['id_apertura','id_producto','id_prodcategoriapadre','precio_compra',
                            'precio_venta','id_medidas','cantidad','total_precio_compra','total_precio_venta','id_usuariocreado',
                            'usuario_creado','id_usuarioactualizo','usuario_actualizo','eliminado','id_usuarioelimino',
                            'id_usuariotermino','usuario_elimino','sede_id'];


    

}
