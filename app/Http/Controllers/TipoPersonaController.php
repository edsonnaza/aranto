<?php

namespace App\Http\Controllers;

use App\Models\TipoPersona;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarTipoPersona;
 

class TipoPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TipoPersona::All();
       // $sedes= Sede::All();
        return view('catastros.tipo_persona.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-tipo-persona');
        return view('catastros.tipo_persona.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarTipoPersona $request)
    {
        $tipo_persona = TipoPersona::create($request->all());


     
   
    return redirect('tipo_persona')->with('mensaje', 'El registro se creó correctamente');
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
        $data = TipoPersona::findOrFail($id);
        return view('catastros.tipo_persona.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarTipoPersona $request,$id)
    { 
        
        TipoPersona::findOrFail($id)->update($request->all());
        return redirect('tipo_persona')->with('mensaje', 'Registro actualizado con éxito');
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
        $tipo_persona = TipoPersona::findOrFail($id);
        $tipo_persona->delete();
        return response()->json(['mensaje' => 'ok']);
     } else {
        abort(404);
    }
    }
}
