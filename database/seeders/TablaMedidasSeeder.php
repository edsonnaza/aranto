<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TablaMedidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();
$medidas = [
    array('id' => '1', 'nombre_unidad_basica' => 'Metro', 'simbolo' => 'm', 'magnitud' => 'Longitud', 'descripcion' => 'Unidad de medida para longitud/distancia', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '2', 'nombre_unidad_basica' => 'Kilogramo', 'simbolo' => 'kg', 'magnitud' => 'Masa', 'descripcion' => 'Unidad de medida para pesos.', 'sedeid' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '3', 'nombre_unidad_basica' => 'litro', 'simbolo' => 'l', 'magnitud' => 'Volúmen', 'descripcion' => 'Unidad de medida para líquidos/volúmen.', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '4', 'nombre_unidad_basica' => 'Metro cuadrado', 'simbolo' => 'm2', 'magnitud' => 'Superficie', 'descripcion' => 'Unidad de medida para superficies.', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '5', 'nombre_unidad_basica' => 'Una unidad', 'simbolo' => '1un', 'magnitud' => 'Unidad', 'descripcion' => 'Unidad de medida unitario.', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now)
];
DB::table('medidas')->insert($medidas);

    
    }
    
}
