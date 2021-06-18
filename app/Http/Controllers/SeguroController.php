<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidarSeguro;
use Illuminate\Http\Request;
use App\Models\Seguro;


class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-seguros');
        $datas = Seguro::orderBy('id')->get();
        return view('catastros.seguros.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-seguro');
        return view('catastros.seguros.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarSeguro $request)
    {
        $seguro = Seguro::create($request->all());
        //$usuario->roles()->sync($request->rol_id);
       // return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');

     
    //Seguro::create($request->all());
    return redirect('seguro')->with('mensaje', 'El seguro se creó correctamente');
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
        
        $data = Seguro::findOrFail($id);
        return view('catastros.seguros.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarSeguro $request, $id)
    {
        Seguro::findOrFail($id)->update($request->all());
        return redirect('seguro')->with('mensaje', 'Registro actualizado con éxito');
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
            $seguro = Seguro::findOrFail($id);
            $seguro->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
