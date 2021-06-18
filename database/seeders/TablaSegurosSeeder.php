<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TablaSegurosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();
        $seguros = [
            array('id' => '1', 'nombre_seguro' => 'Particular', 'descripcion' => 'Seguro particular','sedeid'=>'1', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_seguro' => 'Unimed', 'descripcion' => 'Seguro privado Unimed','sedeid'=>'1', 'created_at' => $now, 'updated_at' => $now),
            
        ];
        DB::table('seguros')->insert($seguros);
    }
}
