<?php

namespace Database\Seeders;
use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TablaGeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $genero = [
            array('id' => '1', 'nombre_genero' => 'Hombre',  'genero'=>'H', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_genero' => 'Mujer', 'genero'=>'M', 'created_at' => $now, 'updated_at' => $now)
            
            
        ];
        DB::table('genero')->insert($genero);
    }
}
