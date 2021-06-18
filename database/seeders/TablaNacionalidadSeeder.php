<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TablaNacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $nacionalidad = [
            array('id' => '1', 'nombre_nacionalidad' => 'Alemana',    'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre_nacionalidad' => 'Argentina',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre_nacionalidad' => 'Brasileña',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre_nacionalidad' => 'Chilena',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'nombre_nacionalidad' => 'Estadounidense',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '6', 'nombre_nacionalidad' => 'Francesa',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '7', 'nombre_nacionalidad' => 'Italiana',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '8', 'nombre_nacionalidad' => 'Japonesa',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '9', 'nombre_nacionalidad' => 'Paraguaya',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '10', 'nombre_nacionalidad' => 'Suiza',   'created_at' => $now, 'updated_at' => $now),
            array('id' => '11', 'nombre_nacionalidad' => 'Uruguaya',   'created_at' => $now, 'updated_at' => $now)
            
        ];
        DB::table('nacionalidad')->insert($nacionalidad);
    }
}
