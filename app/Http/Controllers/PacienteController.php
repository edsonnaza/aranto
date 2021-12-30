<?php

namespace App\Http\Controllers;

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
use App\Models\Productos;

use DB;

 
use App\Http\Requests\ValidarPaciente;
use App\Http\Requests\ValidarPersona;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    can('listar-paciente');
        $datas = Persona::whereHas('ClasificacionPaciente')->get();//with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();
     


        // $sedes= Sede::All();
      return view('catastros.paciente.index', compact('datas'));
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
        $personas=Persona::All();



         return view('catastros.paciente.crear', compact('tipodni','tipopersona','seguro','estadocivil','profesion','clasificacion','nacionalidad','generos','personas'));
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
    public function guardar(Request $request)
    {
     if ($foto = Persona::setFoto($request->foto_up)) {
    $request->request->add(['foto_persona' => $foto]);
}

        $persona = Persona::create([
            'persona_nombre' => $request->persona_nombre,
            'persona_apellido' => $request->persona_apellido,
            'full_name_persona' => $request->persona_nombre . ' ' . $request->persona_apellido,
            'id_tipodni' => $request->id_tipodni,
            'numero_dni' => $request->numero_dni,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'nro_mobil' => $request->nro_mobil,
            'genero' => $request->genero,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'nro_telefono' => $request->nro_telefono,
            'id_tipopersona' => $request->id_tipopersona,
            'id_estadocivil' => $request->id_estadocivil,
            'id_profesion' => $request->id_profesion,
            'id_seguro' => $request->id_seguro,
            'id_clasificacion' => $request->id_clasificacion,
            'id_nacionalidad' => $request->id_nacionalidad,
            'foto_persona' => $request->foto_persona,
            'ruc'=>$request->ruc

        ]);

            $persona->Clasificacion()->sync(1);


        return redirect('paciente/crear')->with('mensaje', 'Registro creado con éxito');
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
            $data = Persona::with('ClasificacionPaciente')->findOrFail($id);
         
            $tipodni = TipoDni::All();
            $tipopersona = TipoPersona::All();
            $seguro = Seguro::All();
            $estadocivil = EstadoCivil::All();
            $profesion = Profesion::All();
            // $clasificacion=Clasificacion::All();
            $clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();

            $nacionalidad = Nacionalidad::All();
            $generos = Genero::All();
            //dd($data);

            return view('catastros.paciente.editar', compact('data', 'tipodni', 'tipopersona', 'seguro', 'estadocivil', 'profesion', 'clasificacion', 'nacionalidad', 'generos'));

     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarPaciente $request, $id)
    {
                //  dd($request);

                //$paciente = Persona::findOrFail($id);
                //dd($paciente);
                $persona = Persona::findOrFail($id);

                // dd($persona);

                

                if ($foto = Persona::setFoto($request->foto_up, $persona->foto_persona)) {
                    $request->request->add(['foto_persona' => $foto]);
                }

                
                $persona->full_name_persona = $request->persona_nombre . ' ' . $request->persona_apellido;

                $persona->update(array_filter($request->all()));


                return redirect('paciente')->with('mensaje', 'Registro actualizado con éxito');

        
        
        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $paciente = Persona::findOrFail($id);
            $paciente->Clasificacion()->detach();
            $paciente->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }


     public function BuscarPersona(Request $request)
    {
                    

          /*      $search = $request->search;

            if ($search == '') {
                $employees = Persona::orderby('full_name_persona', 'asc')->select('*')->limit(5)->get();
            } else {
                $employees = Persona::orderby('full_name_persona', 'asc')->select('*')->where('full_name_persona', 'like', '%' . $search . '%')->limit(5)->get();
            }

            $response = array();
            foreach ($employees as $employee) {
                $response[] = array("value" => $employee->id, "label" => $employee->full_name_persona,"fecha_nacimiento"=>$employee->fecha_nacimiento,"id_seguro"=>$employee->id_seguro,"id_tipodni"=>$employee->id_tipodni,"numero_dni"=>$employee->numero_dni,"genero"=>$employee->genero,"nro_mobil"=>$employee->nro_mobil,"email"=>$employee->email,"nro_telefono"=>$employee->nro_telefono,"facebook"=>$employee->facebook,"foto_persona"=>$employee->foto_persona,"ruc"=>$employee->ruc);
            }
            
            return response()->json($response);*/

             $search = $request->search;

      // if ($request->ajax()) {
      if($search == ''){
         $autocomplate = Productos::orderby('producto_nombre','asc')->select('id','producto_nombre')->limit(5)->get();
      }else{
         $autocomplate = Productos::orderby('producto_nombre','asc')->select('id','producto_nombre')->where('producto_nombre', 'like', '%' .$search . '%')->limit(5)->get();
      }
        
      $response = array();
    // var_dump($response);
      foreach($autocomplate as $autocomplate){
         $response[] = array("id"=>$autocomplate->id,"producto_nombre"=>$autocomplate->producto_nombre);
      }
         
      echo json_encode($response);
       //  return response()->json($response);
      exit;

    

            
    } 

      public function indexsearch(Request $request)
    {
            return view('search');

    }





}
