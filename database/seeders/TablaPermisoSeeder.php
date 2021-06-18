<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $now = Carbon::now()->toDateTimeString();
        $permisos = [
            array('id' => '1', 'nombre' => 'Crear libro', 'slug' => 'crear-libro', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'nombre' => 'Prestar libro', 'slug' => 'prestar-libro', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'nombre' => 'Crear seguro', 'slug' => 'crear-seguro', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'nombre' => 'listar seguro', 'slug' => 'listar-seguro', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '5', 'nombre' => 'Crear Sede', 'slug' => 'crear-sede', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '6', 'nombre' => 'listar sede', 'slug' => 'listar-sedes', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '7', 'nombre' => 'Crear Tipo Persona', 'slug' => 'crear-tipo-persona', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '8', 'nombre' => 'Listar Especialidades', 'slug' => 'listar-especialidades', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '9', 'nombre' => 'Crear Especialidades', 'slug' => 'crear-especialidad', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '10', 'nombre' => 'Listar Estado Civil', 'slug' => 'listar-estado-civil', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '11', 'nombre' => 'Crear Estado Civil', 'slug' => 'crear-estado-civil', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '12', 'nombre' => 'Listar Profesion', 'slug' => 'listar-profesion', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '13', 'nombre' => 'Crear Profesion', 'slug' => 'crear-profesion', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '14', 'nombre' => 'Listar tipo DNI', 'slug' => 'listar-tipo-dni', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '15', 'nombre' => 'Crear tipo DNI', 'slug' => 'crear-tipodni', 'created_at' => $now, 'updated_at' => $now),
        ];
        DB::table('permiso')->insert($permisos);
    }
}
