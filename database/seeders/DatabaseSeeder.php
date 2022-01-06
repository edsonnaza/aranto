<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

	    $this->truncateTablas([
            'menu',
            'permiso',
            'rol',
            'menu_rol',
            'permiso_rol',
            'usuario',
            'usuario_rol',
            'seguros',
            'sedes',
            'tipodni',
            'tipo_persona',
            'estadocivil',
            'profesion',
            'especialidad',
            'personas',
            'clasificacion',
            'clasificacion_persona',
            'nacionalidad',
            'genero',
            'medicos',
            'medidas',
            'unidad',
            'categoriapadre',
            'categoriahijos',
            'productos',
            'existencias',
            'precio_productos',
            'iva',
            'comprasfi_cab',
            'comprasfi_det',
            'tipo_documento',
            'proveedores',
        ]);
        $this->call(TablaSedeSeeder::class);
        $this->call(TablaSegurosSeeder::class);
        $this->call(TablaGeneroSeeder::class);
        $this->call(TablaTipoDNISeeder::class);
        $this->call(TablaIvaSeeder::class);
        $this->call(TablaMedidasSeeder::class);
        $this->call(TablaAlmacenesSeeder::class);

        $this->call(TablaTipoDocumentoSeeder::class);
        $this->call(TablaTipoPersonaSeeder::class);
        $this->call(TablaEstadoCivilSeeder::class);
        $this->call(TablaProfesionSeeder::class);
        $this->call(TablaEspecialidadSeeder::class);
        $this->call(TablaNacionalidadSeeder::class);
        $this->call(TablaClasificacionSeeder::class);
        $this->call(TablaRolSeeder::class);
        $this->call(TablaMenuSeeder::class);
        $this->call(TablaMenuRolSeeder::class);
        $this->call(TablaPermisoSeeder::class);       
        $this->call(UsuarioAdministradorSeeder::class);        
        $this->call(TablaPermisoRolSeeder::class);
    
        $this->call(TablaCategoriaPadreSeeder::class);
        $this->call(TablaCategoriaHijosSeeder::class);
        $this->call(TablaProductosSeeder::class);
        $this->call(TablaProductoExistenciaSeeder::class);
        $this->call(TablaPrecioProductosSeeder::class);
        $this->call(TablaProveedoresSeeder::class);

    }

	    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

