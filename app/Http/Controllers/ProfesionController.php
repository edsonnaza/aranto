<?php

namespace App\Http\Controllers;

use App\Profesion;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarProfesion;

class ProfesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $datas = Profesion::All();
       // $sedes= Sede::All();
        return view('catastros.profesion.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-profesion');
        return view('catastros.profesion.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarProfesion $request)
    {
        $profesion = Profesion::create($request->all());


     
   
    return redirect('profesion/crear')->with('mensaje', 'El registro se creó correctamente');
    }

     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesion  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = Profesion::findOrFail($id);
        return view('catastros.profesion.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesion  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarProfesion $request,$id)
    { 
        
        Profesion::findOrFail($id)->update($request->all());
        return redirect('profesion')->with('mensaje', 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesion  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {
        
       //  dd($id);
       if ($request->ajax()) {
        $query = Profesion::findOrFail($id);
        $query->delete();
        return response()->json(['mensaje' => 'ok']);
     } else {
        abort(404);
    }
    }
}
