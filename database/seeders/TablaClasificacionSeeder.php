<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TablaClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();
        $clasificacion = [
            array('id' => '1', 'nombre_clasificacion' => 'Paciente',    'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_clasificacion' => 'Médico',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre_clasificacion' => 'Funcionario',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre_clasificacion' => 'Proveedor',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'nombre_clasificacion' => 'Usuario del sistema',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '6', 'nombre_clasificacion' => 'Sin Especificar',   'created_at' => $now, 'updated_at' => $now)
            
        ];
        DB::table('clasificacion')->insert($clasificacion);
    }
}
