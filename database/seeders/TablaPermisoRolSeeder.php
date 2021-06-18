<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TablaPermisoRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permisoRols = [
            array('rol_id' => '1', 'permiso_id' => '1'),
            array('rol_id' => '1', 'permiso_id' => '2'),
            array('rol_id' => '1', 'permiso_id' => '3'),
            array('rol_id' => '1', 'permiso_id' => '4'),
            array('rol_id' => '1', 'permiso_id' => '5'),
            array('rol_id' => '1', 'permiso_id' => '6'),
            array('rol_id' => '1', 'permiso_id' => '7'),
            array('rol_id' => '1', 'permiso_id' => '8'),
            array('rol_id' => '1', 'permiso_id' => '9'),
            array('rol_id' => '1', 'permiso_id' => '10'),
            array('rol_id' => '1', 'permiso_id' => '11'),
            array('rol_id' => '1', 'permiso_id' => '12'),
            array('rol_id' => '1', 'permiso_id' => '13'),
            array('rol_id' => '1', 'permiso_id' => '14'),
            array('rol_id' => '1', 'permiso_id' => '15'),
        ];
        DB::table('permiso_rol')->insert($permisoRols);
    }
}
