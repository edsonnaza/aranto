<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarEspecialidad;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Especialidad::All();
       // $sedes= Sede::All();
        return view('catastros.especialidad.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-especialidad');
        return view('catastros.especialidad.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarEspecialidad $request)
    {
        $especialidad = Especialidad::create($request->all());


     
   
    return redirect('especialidad/crear')->with('mensaje', 'El registro se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function mostrar(TipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Especialidad::findOrFail($id);
        return view('catastros.especialidad.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarEspecialidad $request,$id)
    { 
        
        Especialidad::findOrFail($id)->update($request->all());
        return redirect('especialidad')->with('mensaje', 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {
        
       //  dd($id);
       if ($request->ajax()) {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();
        return response()->json(['mensaje' => 'ok']);
     } else {
        abort(404);
    }
    }
}
