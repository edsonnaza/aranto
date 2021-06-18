<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seguridad\Usuario;
use App\Models\Persona;
use App\Models\ClasificacionPersona;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $persona = Persona::create([
            'id' =>'1',
            'persona_nombre' => 'Edson Nazareno',
            'persona_apellido' => 'Sánchez Epping',
            'full_name_persona' => 'Edson Nazareno Sánchez Epping',
            'id_tipodni' => '1',
            'numero_dni'=>'3375209',
            'email' =>'edsonnaza@gmail.com',
            'facebook' =>'',
            'nro_mobil' =>'0982692225',
            'nro_telefono' =>'',
            'id_tipopersona' =>'1',
            'id_estadocivil' =>'2',
            'id_profesion' =>'3',
            'id_seguro' =>'1',
            'genero' =>'H',
            'id_nacionalidad'=>'9',
            'foto_persona' =>'PXNfH5ct6xu0oClFh2p4.jpg'
        ]);
      //  DB::table('personas')->insert($persona);

        $usuario = Usuario::create([
            'usuario' => 'admin',
            'nombre' => 'Administrador',
            'email' => 'edsonnaza@gmail.com',
            'password' => 'pass123',
            'foto' =>'PXNfH5ct6xu0oClFh2p4.jpg',
            'sede_id' =>'1',
            'id_persona' =>'1'
        ]);

        $clasificacion_persona = ClasificacionPersona::create([
            'id_clasificacion' => '5',
            'id_persona' => '1'
             
        ]);
        $clasificacion_persona = ClasificacionPersona::create([
    'id_clasificacion' => '1',
    'id_persona' => '1',

]);



        

        $usuario->roles()->sync(1);
    }
}
