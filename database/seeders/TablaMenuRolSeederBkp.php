<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaMenuRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuRols = [
            array('rol_id' => '1', 'menu_id' => '1'),
            array('rol_id' => '1', 'menu_id' => '2'),
            array('rol_id' => '1', 'menu_id' => '4'),
            array('rol_id' => '1', 'menu_id' => '3'),
            array('rol_id' => '1', 'menu_id' => '5'),
            array('rol_id' => '2', 'menu_id' => '6'),
            array('rol_id' => '2', 'menu_id' => '7'),
            array('rol_id' => '1', 'menu_id' => '7'),
            array('rol_id' => '1', 'menu_id' => '6'),
            array('rol_id' => '1', 'menu_id' => '8'),
            array('rol_id' => '1', 'menu_id' => '9'),
            array('rol_id' => '1', 'menu_id' => '10'),
            array('rol_id' => '1', 'menu_id' => '11'),
            array('rol_id' => '1', 'menu_id' => '12'),
            array('rol_id' => '1', 'menu_id' => '18'),
            array('rol_id' => '1', 'menu_id' => '14'),
            array('rol_id' => '1', 'menu_id' => '19'),
            array('rol_id' => '1', 'menu_id' => '13'),
            array('rol_id' => '1', 'menu_id' => '16'),
            array('rol_id' => '1', 'menu_id' => '15'),
            array('rol_id' => '1', 'menu_id' => '17'),
            array('rol_id' => '1', 'menu_id' => '20'),
            array('rol_id' => '1', 'menu_id' => '21'),
            array('rol_id' => '1', 'menu_id' => '22'),
            array('rol_id' => '1', 'menu_id' => '23'),
            array('rol_id' => '1', 'menu_id' => '24'),
            array('rol_id' => '1', 'menu_id' => '25'),
            array('rol_id' => '1', 'menu_id' => '26')


            
        ];
        DB::table('menu_rol')->insert($menuRols);
    }
}
