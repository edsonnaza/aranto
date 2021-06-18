<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class TablaProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
$productos = [
    array('id' => '1', 'producto_nombre' => 'CONSULTA GINECOLOGIA Y OBSTETRICIA', 'producto_descripcion'=>'DRA.PAOLA BORJA DRA.GLADIS GUTSTEIN DR.RAFAEL ADORNO DR.JORGE GOMEZ FREY DR.OSVALDO PALACIOS.', 'id_prodcategoriapadre'=>'1','id_categoriahijo'=>'1','id_medidasbasicas'=>'5','id_iva'=>'2','sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '2', 'producto_nombre' => 'RX DE TORAX AP', 'producto_descripcion'=>'SIN DESCRIPCION.', 'id_prodcategoriapadre'=>'2','id_categoriahijo'=>'3','id_medidasbasicas'=>'5','id_iva'=>'2','sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
    array('id' => '3', 'producto_nombre' => 'RX DE COLUMNA LUMBAR AP Y LAT.', 'producto_descripcion'=>'SIN DESCRIPCION.', 'id_prodcategoriapadre'=>'2','id_categoriahijo'=>'3','id_medidasbasicas'=>'5','id_iva'=>'2','sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
   

];
DB::table('productos')->insert($productos);
    }
}
