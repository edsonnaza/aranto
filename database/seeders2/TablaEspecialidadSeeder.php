<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TablaEspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $especialidad = [
            array('id' => '1', 'nombre_especialidad' => 'Odontologo',  'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_especialidad' => 'Pediatra', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre_especialidad' => 'Clínico Familiar',  'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre_especialidad' => 'Oftalmólogo', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'nombre_especialidad' => 'Bioquímico/a', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '6', 'nombre_especialidad' => 'Otros', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now)
            
        ];
        DB::table('especialidad')->insert($especialidad);
    }
}
