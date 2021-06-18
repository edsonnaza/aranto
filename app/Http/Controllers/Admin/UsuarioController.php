<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Admin\Rol;
use App\Http\Requests\ValidacionUsuario;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Sede;
use App\Models\Medico;
use App\Models\Persona;

class UsuarioController extends Controller
{

    public function index()
    {
        $datas = Usuario::with('roles:id,nombre')->orderBy('id')->get();
        $sedes= Sede::All();

       // dd($datas);
        //$persona=Persona::with('personas:persona_nombre,persona_apellido');
        return view('admin.usuario.index', compact('datas','sedes'));
    }

    public function crear()
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
       // $sedes=Sede::orderBy('id')->pluck('nombre_sede', 'id')->toArray();
       $sedes= Sede::All();
       $medicos=Medico::All(); 
       $personas=Persona::All();
        return view('admin.usuario.crear', compact('rols','sedes','medicos','personas'));
    }


    public function guardar(ValidacionUsuario $request)
    {      /* $persona=Persona::create([
            'persona_nombre' =>$request->persona_nombre,
            'persona_apellido'=>$request->persona_apellido,
            'full_name_persona'=>$request->persona_nombre.' '.$request->persona_apellido,
            'id_tipodni'=>NULL,
            'numero_dni'=>NULL,
            'email'=>$request->email,
            'facebook'=>NULL,
            'nro_mobil'=>NULL,
            'nro_telefono'=>NULL,
            'id_tipodni'=>'1',
            'id_tipopersona'=>'1',
            'id_estadocivil'=>'1',
            'id_profesion'=>'1',
            'id_seguro'=>'1']);
           // $persona=Persona::last();
            $request->request->add(['id_persona'=>$persona->id]);*/

       
        if ($foto = Usuario::setFoto($request->foto_up))
            $request->request->add(['foto' => $foto]);
            $usuario = Usuario::create($request->all());
            $usuario->roles()->sync($request->rol_id);
            // protected $fillable = ['id', 'persona_nombre', 'persona_apellido', 'full_name_persona','id_tipodni','numero_dni','email','facebook','nro_mobil','nro_telefono' , 'id_tipopersona','id_estadocivil','id_profesional','id_seguro'];

       
        //$usuario->sedes()->sync($request->sede_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');
    }


    public function editar($id)
    {
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Usuario::with('roles')->findOrFail($id);
        $sedes=Sede::orderBy('id')->pluck('nombre_sede', 'id')->toArray();
        $sedes= Sede::All();
        $medicos=Medico::All();
        $personas = Persona::All();

       // $persona = Persona::findOrFail($data->id_usuario);
        
        return view('admin.usuario.editar', compact('data', 'rols','sedes','medicos','personas'));
    }


    public function actualizar(ValidacionUsuario $request, $id)
    {
       
          // dd($request);

        $usuario = Usuario::findOrFail($id);
       // dd($usuario);

        
        if ($foto = Usuario::setFoto($request->foto_up, $usuario->foto))
            $request->request->add(['foto' => $foto]);
            //dd($request->all());
           // $usuario->id_medico=$request->id_medico;

            $usuario->update(array_filter($request->all()));
      //  $persona=Persona::findorFail($usuario->id_persona);
        //dd($persona);
        
      //  $persona->persona_nombre=$request->persona_nombre;
       // $persona->persona_apellido=$request->persona_apellido;
       // dd($request->persona_nombre);
        //$persona->update();


        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $usuario = Usuario::findOrFail($id);
            $usuario->roles()->detach();
            $usuario->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
