<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
 
use Illuminate\Support\Facades\DB;
class TablaCategoriaHijosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $now = Carbon::now()->toDateTimeString();
        $categoriahijos = [
            array('id' => '1', 'nombre_categoriahijo' => 'Consulta Familiar','id_categoriapadre'=>'1','sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_categoriahijo' => 'Consulta Odontológica','id_categoriapadre'=>'1', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre_categoriahijo' => 'Radiografías','id_categoriapadre'=>'2','sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre_categoriahijo' => 'Capsulas Blandas','id_categoriapadre'=>'4', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'nombre_categoriahijo' => 'Comprimidos','id_categoriapadre'=>'4', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
            array('id' => '6', 'nombre_categoriahijo' => 'Jarabes','id_categoriapadre'=>'4', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
            array('id' => '7', 'nombre_categoriahijo' => 'Jeringas','id_categoriapadre'=>'5', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),

        ];
        DB::table('categoriahijos')->insert($categoriahijos);
    }
}
