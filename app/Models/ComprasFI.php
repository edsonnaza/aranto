<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComprasFIDET;
use App\Models\Productos;
 

class ComprasFI extends Model
{
    use HasFactory;

     protected $table = 'comprasfi_cab';
     protected $fillable = ['id_unidad_origen','id_unidad_destino','id_proveedor','id_tipodocumento','numero_documento','descripcion_documento','importe_totalcompra','descuento_total','fecha_documento','id_usuariorecibio','usuario_recibio','id_usuariocreado','usuario_creado','id_usuariotermino','usuario_termino','pendiente_entrega','terminado','clave_verificado','fecha_terminado','eliminado','id_usuarioelimino','usuario_elimino','id_usuarioactualizo','usuario_actualizo','sede_id'];


     /*
            $compras->productos()->attach(4, ['cantidad' => 10, 'precio_compra' => 45000,
            'id_medidas'=>1,'precio_venta'=>65000,'total_precio_compra'=>450000,
            'total_precio_venta'=>650000,'sede_id'=>1]);
     */


         


         public function productos()
        {
            return $this->belongsToMany('Productos', 'comprasfi_det', 
                    'id_apertura', 'id_producto')
                    ->withPivot('cantidad', 'precio_compra')
                    ->withTimestamps();
        }
  
}
