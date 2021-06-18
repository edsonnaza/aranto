<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaAlmacenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $now = Carbon::now()->toDateTimeString();
            $unidad = [
            array('id' => '1', 'nombre_unidad' => 'Farmacia Interna', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_unidad' => 'Internados', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre_unidad' => 'Urgencias', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre_unidad' => 'Quirofano', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now)
            ];  
        DB::table('unidad')->insert($unidad);
    }
}
