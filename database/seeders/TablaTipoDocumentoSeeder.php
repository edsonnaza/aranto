<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TablaTipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
$tipo_documento = [
    array('id' => '1', 'documento_nombre' => 'Ticket', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '2', 'documento_nombre' => 'Boleta', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),
    array('id' => '3', 'documento_nombre' => 'Factura', 'sede_id' => '1', 'created_at' => $now, 'updated_at' => $now),

];
DB::table('tipo_documento')->insert($tipo_documento);
    }
}
