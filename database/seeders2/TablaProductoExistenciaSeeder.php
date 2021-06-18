<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class TablaProductoExistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  protected $fillable = ['id_almacen', 'id_producto', 'cantidad_minima','precio_costo','cantidad','id_usuarioelimino','usuario_elimino','id_usuarioactualizo','usuario_actualizo','sede_id'];

     * @return void
     */
    public function run()
    {
    $now = Carbon::now()->toDateTimeString();
    $existencias = [
    array('id' => '1', 'id_unidad'=>'1','id_producto'=>'1','cantidad'=>'10','cantidad_minima'=>'5','sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '2', 'id_unidad'=>'2','id_producto'=>'1','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '3', 'id_unidad'=>'3','id_producto'=>'1','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '4', 'id_unidad'=>'4','id_producto'=>'1','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
   
    array('id' => '5', 'id_unidad'=>'1','id_producto'=>'2','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '6', 'id_unidad'=>'2','id_producto'=>'2','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '7', 'id_unidad'=>'3','id_producto'=>'2','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '8', 'id_unidad'=>'4','id_producto'=>'2','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
 
    array('id' => '9', 'id_unidad'=>'1','id_producto'=>'3','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '10', 'id_unidad'=>'2','id_producto'=>'3','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '11', 'id_unidad'=>'3','id_producto'=>'3','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '12', 'id_unidad'=>'4','id_producto'=>'3','cantidad'=>'10','cantidad_minima'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
 
];
    DB::table('existencias')->insert($existencias);

    }
}
