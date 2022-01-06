<?php

namespace App\Http\Controllers;
use App\Models\TipoPersona;
use App\Models\Medico;
use App\Models\Persona;
use App\Models\Paciente;
use App\Models\TipoDNI;
use App\Models\Seguro;
use App\Models\Clasificacion;
use App\Models\Nacionalidad;
use App\Models\EstadoCivil;
use App\Models\Profesion;
use App\Models\Genero;
use App\Models\Especialidad;
use App\Models\Seguridad\Usuario;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
     public function index()
    {
       // $datas = Medico::All();//with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();
        $datas = Persona::whereHas('ClasificacionProveedor')->get(); //with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();

        $especialidades=Especialidad::All();
        // $sedes= Sede::All();
        return view('catastros.proveedores.index', compact('datas','especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
       // $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        // $sedes=Sede::orderBy('id')->pluck('nombre_sede', 'id')->toArray();
        $tipodni= TipoDni::All();
        $tipopersona=TipoPersona::All();
        $seguro=Seguro::All();
        $estadocivil=EstadoCivil::All();
        $profesion=Profesion::All();
        $clasificacion=Clasificacion::All();
        $nacionalidad=Nacionalidad::All();
        $generos=Genero::All();
        $especialidades=Especialidad::All();
        $usuarios=Usuario::All();



         return view('catastros.proveedores.crear', compact('tipodni','tipopersona','seguro','estadocivil','profesion','clasificacion','nacionalidad','generos','especialidades','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  protected $fillable = ['persona_nombre', 'persona_apellido', 'full_name_persona','id_tipodni','numero_dni',
     * 'email','facebook','nro_mobil','nro_telefono' ,'genero','id_clasificacion','id_nacionalidad','fecha_nacimiento', 
     * 'id_tipopersona','id_estadocivil','id_profesion','id_seguro','foto_persona'];

     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarMedico $request)
    {
        if ($foto = Persona::setFoto($request->foto_up))
        $request->request->add(['foto_persona' => $foto]);
        $persona=Persona::create([
            'persona_nombre' =>$request->persona_nombre,
            'persona_apellido'=>$request->persona_apellido,
            'full_name_persona'=>$request->persona_nombre.' '.$request->persona_apellido,
            'id_tipodni'=>$request->id_tipodni,
            'numero_dni'=>$request->numero_dni,
            'email'=>$request->email,
            'facebook'=>$request->facebook,
            'nro_mobil'=>$request->nro_mobil,
            'genero'=>$request->genero,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'nro_telefono'=>$request->nro_telefono,
            'id_tipopersona'=>$request->id_tipopersona,
            'id_estadocivil'=>$request->id_estadocivil,
            'id_profesion'=>$request->id_profesion,
            'id_seguro'=>$request->id_seguro,
            'id_clasificacion'=>$request->id_clasificacion,
            'id_nacionalidad'=>$request->id_nacionalidad,          
            'foto_persona'=>$request->foto_persona
            
            ]);
           // $persona=Persona::last();
           // $request->request->add(['id_persona'=>$persona->id]);
           // protected $fillable = ['paciente_nombre', 'id_persona','sede_id'];
           $proveedores=Proveedores::create([
           
            'id_persona'=>$persona->id,
            'proveedor_nombre'=>$request->persona_nombre.' '.$request->persona_apellido,
            'sede_id'=>$request->sede_id,
             'ruc'=>$request->ruc,
            'id_especialidad'=>$request->id_especialidad,
            'registro_profesional'=>$request->registro_profesional
                     
            ]);
            



        return redirect('proveedores/crear')->with('mensaje', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {

        
        $data = Persona::whereHas('ClasificacionMedico')->findOrFail($id);
        $foto_persona = $data->foto_persona;
        $tipodni = TipoDni::All();
        $tipopersona = TipoPersona::All();
        $seguro = Seguro::All();
        $estadocivil = EstadoCivil::All();
        $profesion = Profesion::All();
        // $clasificacion=Clasificacion::All();
        $clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();
        $especialidades = Especialidad::All();

        $nacionalidad = Nacionalidad::All();
        $generos = Genero::All();
        $usuarios=Usuario::All();
        //dd($data);

        return view('catastros.proveedores.editar', compact('data', 'tipodni', 'tipopersona', 'seguro', 'estadocivil', 'profesion', 'clasificacion', 'nacionalidad', 'generos', 'foto_persona','especialidades','usuarios'));


        //$rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
       /* $data = Medico::findOrFail($id);
        $foto_persona=$data->persona->foto_persona;
        $persona=Persona::findOrFail($data->id_persona);
       
        $tipodni= TipoDni::All();
        $tipopersona=TipoPersona::All();
        $seguro=Seguro::All();
        $estadocivil=EstadoCivil::All();
        $profesion=Profesion::All();
        $clasificacion=Clasificacion::All();
        $nacionalidad=Nacionalidad::All();
        $generos=Genero::All();
        $especialidades=Especialidad::All();
        $usuarios=Usuario::All();
        
        return view('catastros.medico.editar', compact('data', 'tipodni','tipopersona','seguro','estadocivil','profesion','clasificacion','nacionalidad','generos','foto_persona','especialidades','usuarios'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarMedico $request, $id)
    {
                /*$medico = Medico::findOrFail($id);
                $persona=Persona::findOrFail($medico->id_persona);
                    
                if ($foto = Persona::setFoto($request->foto_up, $medico->persona->foto_persona))
                        $request->request->add(['foto_persona' => $foto]);  
                
                        $persona->full_name_persona=$request->persona_nombre.' '.$request->persona_apellido;
                        $persona->update(array_filter($request->all()));
                    // $persona->update();
                        $medico->medico_nombre=$request->persona_nombre.' '.$request->persona_apellido;
                        $medico->registro_profesional=$request->registro_profesional;
                        $medico->id_especialidad=$request->id_especialidad;
                        $medico->update();

                        $usuario=Usuario::findOrFail($request->id_medico);
                        $usuario->id_medico=$medico->id;
                        $usuario->update();*/

                        // dd($request);

        //$paciente = Persona::findOrFail($id);
        //dd($paciente);
        $persona = Persona::findOrFail($id);

        // dd($persona);

        // $persona=Persona::findOrFail($data->id_persona);

        if ($foto = Persona::setFoto($request->foto_up, $persona->foto_persona)) {
            $request->request->add(['foto_persona' => $foto]);
        }

            $persona->full_name_persona = $request->persona_nombre . ' ' . $request->persona_apellido;

            $persona->update(array_filter($request->all()));
            //$persona->update();

            // $paciente->paciente_nombre=$request->persona_nombre.' '.$request->persona_apellido;
            //  $paciente->update();

            //dd($request->foto_persona);
             $persona->Clasificacion()->sync($request->id_clasificacion);

      // return redirect('persona')->with('mensaje', 'Registro actualizado con éxito');

               // dd($request);
                return redirect('proveedores')->with('mensaje', 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {
        if ($request->ajax()) {
           $persona = Persona::findOrFail($id);
            $persona->Clasificacion()->detach();

             // $medico->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
