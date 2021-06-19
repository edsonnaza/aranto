<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComprasFI;
class ComprasFI extends Model
{
    use HasFactory;

     protected $table = 'comprasfi_cab';
    protected $fillable = ['id', 'id_unidad_origen','id_unidad_destino','id_proveedor','id_tipodocumento','numero_documento','descripcion_documento','importe_totalcompra','descuento_total','fecha_documento','id_usuariorecibio','usuario_recibio','id_usuariocreado','usuario_creado','id_usuariotermino','usuario_termino','pendiente_entrega','terminado','clave_verificado','fecha_terminado','eliminado','id_usuarioelimino','usuario_elimino','id_usuarioactualizo','usuario_actualizo','sede_id'];
}
