<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $estadocivil = [
            array('id' => '1', 'nombre_estadocivil' => 'Soltero/a',  'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_estadocivil' => 'Casado/a', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre_estadocivil' => 'Divorciado/a',  'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre_estadocivil' => 'Viudo/a', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'nombre_estadocivil' => 'Sin especificar', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now)
            
        ];
        DB::table('estadocivil')->insert($estadocivil);
    }
}
