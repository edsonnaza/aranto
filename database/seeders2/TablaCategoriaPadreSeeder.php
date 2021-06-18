<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TablaCategoriaPadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $now = Carbon::now()->toDateTimeString();
        $categoriapadre = [
                array('id' => '1', 'nombre_categoriapadre' => 'Consultas', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
                array('id' => '2', 'nombre_categoriapadre' => 'Servicios', 'sede_id'=>'1','created_at' => $now, 'updated_at' => $now),
                array('id' => '3', 'nombre_categoriapadre' => 'Otros','sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
                 array('id' => '4', 'nombre_categoriapadre' => 'Medicamentos','sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
                 array('id' => '5', 'nombre_categoriapadre' => 'Descartables','sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),

            ];
            DB::table('categoriapadre')->insert($categoriapadre);
    }
}
