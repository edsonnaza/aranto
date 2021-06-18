<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidarUnidad;
use App\Models\Unidad;



use Illuminate\Http\Request;
 

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-unidad');
        $datas = Unidad::orderBy('id')->get();
        return view('catastros.unidad.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-unidad');
        return view('catastros.unidad.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarUnidad $request)
    {
        $unidad = Unidad::create($request->all());
        //$usuario->roles()->sync($request->rol_id);
       // return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');

     
    //Seguro::create($request->all());
    return redirect('unidad')->with('mensaje', 'El registro se creó correctamente');
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
        
        $data = Unidad::findOrFail($id);
        return view('catastros.unidad.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarUnidad $request, $id)
    {
        Unidad::findOrFail($id)->update($request->all());
        return redirect('unidad')->with('mensaje', 'Registro actualizado con éxito');
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
            $unidad = Unidad::findOrFail($id);
            $unidad->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
