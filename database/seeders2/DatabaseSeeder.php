<?php
namespace Database\Seeders;
 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
        ]);

        $this->call([TablaSedeSeeder::class,
                    TablaSegurosSeeder::class,
                     TablaGeneroSeeder::class,
                     TablaTipoDNISeeder::class,
                     TablaIvaSeeder::class,
                     TablaMedidas::class,
                     TablaAlmacenesSeeder::class,

                     TablaTipoDocumentoSeeder::class,
                    TablaTipoPersonaSeeder::class,
                     TablaEstadoCivilSeeder::class,
                    TablaProfesionSeeder::class,
                  TablaEspecialidadSeeder::class,
                    TablaNacionalidadSeeder::class,
                    TablaClasificacionSeeder::class,
                    TablaRolSeeder::class,
                  TablaMenuSeeder::class,
                     TablaMenuRolSeeder::class,
                     TablaPermisoSeeder::class,       
                     UsuarioAdministradorSeeder::class,        
                    TablaPermisoRolSeeder::class,
                
                     TablaCategoriaPadreSeeder::class,
                     TablaCategoriaHijosSeeder::class,
                     TablaProductosSeeder::class,
                     TablaProductoExistenciaSeeder::class,
                   TablaPrecioProductosSeeder::class,

            ]);


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

/* $this->call(TablaSegurosSeeder::class);
        $this->call(TablaGeneroSeeder::class);
        $this->call(TablaTipoDNISeeder::class);
        $this->call(TablaIvaSeeder::class);
        $this->call(TablaMedidas::class);
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
*/