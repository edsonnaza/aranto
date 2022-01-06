<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class TablaPrecioProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $now = Carbon::now()->toDateTimeString();
    $precio_productos = [
    array('id' => '1', 'id_producto'=>'1','id_seguro'=>'1','precio_costo'=>'90000','precio_venta'=>'150000',  'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '2', 'id_producto'=>'1','id_seguro'=>'2','precio_costo' =>'95000', 'precio_venta'=>'180000',  'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '3', 'id_producto'=>'2','id_seguro'=>'1','precio_costo' => '80000', 'precio_venta'=>'130000',  'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '4', 'id_producto'=>'2','id_seguro'=>'2','precio_costo'=>'90000','precio_venta'=>'150000',  'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '5', 'id_producto'=>'3','id_seguro'=>'1','precio_costo' =>'85000', 'precio_venta'=>'125000',  'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '6', 'id_producto'=>'3','id_seguro'=>'2','precio_costo' =>'90000', 'precio_venta'=>'160000',  'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),


];
DB::table('precio_productos')->insert($precio_productos);
    }
}
