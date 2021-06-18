<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidarTipoDNI;
use App\Models\TipoDNI;
use Illuminate\Http\Request;

class TipoDNIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   can('listar-tipo-dni');
        $datas = TipoDNI::All();
        return view('catastros.tipodni.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-tipodni');
        return view('catastros.tipodni.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarTipoDNI $request)
    {  
        $query = TipoDNI::create($request->all());    
   
    return redirect('tipodni')->with('mensaje', 'El registro se creó correctamente');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $data = TipoDNI::findOrFail($id);
        return view('catastros.tipodni.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarTipoDNI $request,$id)
    { 
        dd($request);
      //  $tipodni=TipoDNI::findOrFail($id);
      //  $tipodni->nombre_tipodni=$request->nombre_tipodni;
       // $tipodni->update();

      //  return redirect('tipodni')->with('mensaje', 'Registro actualizado con éxito');
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
        $query = TipoDNI::findOrFail($id);
        $query->delete();
        return response()->json(['mensaje' => 'ok']);
     } else {
        abort(404);
    }
    }
}
