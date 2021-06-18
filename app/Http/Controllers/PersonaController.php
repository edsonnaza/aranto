<?php

namespace App\Http\Controllers;




use App\Http\Requests\ValidarPersona;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\Paciente;
use App\Models\TipoDNI;
use App\Models\TipoPersona;
use App\Models\Seguro;
use App\Models\Clasificacion;
use App\Models\Nacionalidad;
use App\Models\EstadoCivil;
use App\Models\Profesion;
use App\Models\Genero;
use App\Models\Especialidad;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Persona::All();//with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();
        // $sedes= Sede::All();
         return view('catastros.persona.index', compact('datas'));
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
        //$clasificacion=Clasificacion::orderBy('id')->pluck('nombre_clasificacion','id');
        $nacionalidad=Nacionalidad::All();
        $generos=Genero::All();
        $especialidades = Especialidad::All();

        $clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();




         return view('catastros.persona.crear', compact('tipodni','tipopersona','seguro','estadocivil','profesion','clasificacion','nacionalidad','generos','especialidades'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
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

            $persona->Clasificacion()->sync($request->id_clasificacion);

           // $persona=Persona::last();
           // $request->request->add(['id_persona'=>$persona->id]);
           // protected $fillable = ['paciente_nombre', 'id_persona','sede_id'];
         /*  $paciente=Paciente::create([
           
            'id_persona'=>$persona->id,
            'paciente_nombre'=>$request->persona_nombre.' '.$request->persona_apellido,
            'sede_id'=>$request->sede_id
             
            
            ]);*/
           /// $persona->roles()->sync($request->rol_id);


        return redirect('persona/crear')->with('mensaje', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
      
        
         $data=Persona::with('Clasificacion')->findOrFail($id);
         $foto_persona=$data->foto_persona;
         $tipodni= TipoDni::All();
         $tipopersona=TipoPersona::All();
         $seguro=Seguro::All();
         $estadocivil=EstadoCivil::All();
         $profesion=Profesion::All();
        // $clasificacion=Clasificacion::All();
        $clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();
        $especialidades = Especialidad::All();

        $nacionalidad=Nacionalidad::All();
         $generos=Genero::All();
         //dd($data);
         
        return view('catastros.persona.editar', compact('data', 'tipodni','tipopersona','seguro','estadocivil','profesion','clasificacion','nacionalidad','generos','foto_persona','especialidades'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarPersona $request, $id)
    {
          // dd($request);

          //$paciente = Persona::findOrFail($id);
          //dd($paciente);
         $persona=Persona::findOrFail($id);

        // dd($persona);

       // $persona=Persona::findOrFail($data->id_persona);
  
          
         if ($foto = Persona::setFoto($request->foto_up, $persona->foto_persona))
              $request->request->add(['foto_persona' => $foto]);

             // if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
             // $request->request->add(['foto' => $foto]);


           //   dd($request->foto_persona);
  
               
       /* $persona->persona_nombre=$request->persona_nombre;
        $persona->persona_apellido=$request->persona_apellido;
      
        $persona->id_tipodni=$request->id_tipodni;
        $persona->numero_dni=$request->numero_dni;
        $persona->email=$request->email;
        $persona->facebook=$request->facebook;
        $persona->nro_mobil=$request->nro_mobil;
        $persona->genero=$request->genero;
        $persona->fecha_nacimiento=$request->fecha_nacimiento;
        $persona->nro_telefono=$request->nro_telefono;
        $persona->id_tipopersona=$request->id_tipopersona;
        $persona->id_estadocivil=$request->id_estadocivil;
        $persona->id_profesion=$request->id_profesion;
        $persona->id_seguro=$request->id_seguro;
        $persona->id_clasificacion=$request->id_clasificacion;
        $persona->id_nacionalidad=$request->id_nacionalidad;        
        $persona->foto_persona=$request->foto_persona;*/
        $persona->full_name_persona=$request->persona_nombre.' '.$request->persona_apellido;
        
        $persona->update(array_filter($request->all()));
        //$persona->update();

       // $paciente->paciente_nombre=$request->persona_nombre.' '.$request->persona_apellido;
      //  $paciente->update();

        //dd($request->foto_persona);
        $persona->Clasificacion()->sync($request->id_clasificacion);

   
         return redirect('persona')->with('mensaje', 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $persona = Persona::findOrFail($id);
            $persona->Clasificacion()->detach();
            $persona->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
