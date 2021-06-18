<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedidasBasicas;
use App\Http\Requests\ValidarMedidasBasicas;



class MedidasBasicasController extends Controller
{
    public function index()
    {
        can('listar-medidasbasicas');
        $datas = MedidasBasicas::orderBy('id')->get();
        return view('catastros.medidasbasicas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-medidasbasicas');
        return view('catastros.medidasbasicas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarMedidasBasicas $request)
    {
        $medidasbasicas = MedidasBasicas::create($request->all());
        //$usuario->roles()->sync($request->rol_id);
       // return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');

     
    //Seguro::create($request->all());
    return redirect('medidas_basicas')->with('mensaje', 'El unidad de medida se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
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
        
        $data = MedidasBasicas::findOrFail($id);
        return view('catastros.medidasbasicas.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarMedidasBasicas $request, $id)
    {
        MedidasBasicas::findOrFail($id)->update($request->all());
        return redirect('medidas_basicas')->with('mensaje', 'Registro actualizado con éxito');
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
            $seguro = MedidasBasicas::findOrFail($id);
            $seguro->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
