<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class TablaTipoDNISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $tipodni = [
            array('id' => '1', 'nombre_tipodni' => 'Cédula de Identidad',  'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_tipodni' => 'Pasaporte', 'sede_id'=>'1', 'created_at' => $now, 'updated_at' => $now),
            
        ];
        DB::table('tipodni')->insert($tipodni);
    }
}
