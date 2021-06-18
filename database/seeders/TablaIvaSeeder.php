<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TablaIvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                  $now = Carbon::now()->toDateTimeString();
$iva = [
    array('id' => '1', 'iva_nombre' => 'IVA 5%', 'porcentaje' => '5', 'valor_aritmetico' => '00.5', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '2', 'iva_nombre' => 'IVA 10%', 'porcentaje' => '10', 'valor_numerico' => '0.10', 'sedeid' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '3', 'iva_nombre' => 'EXENTA', 'porcentaje' => '0', 'valor_numerico' => '0.0', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
   ];
DB::table('iva')->insert($iva);
    }
}
