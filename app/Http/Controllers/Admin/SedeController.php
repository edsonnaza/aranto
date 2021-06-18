<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Sede;
use App\Http\Requests\ValidarSede;
 

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //dd('sedes.index');
        $datas = Sede::orderBy('id')->get();
       // $datas = Sede::with('sedes:id,nombre_sede,direccion,ruc,telefono,foto_sede')->orderBy('id')->get();
        return view('admin.sede.index', compact('datas'));

       // dd($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-sedes');
        return view('admin.sede.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarSede $request)
    {
        if ($foto = Sede::setLogo($request->foto_up))
        $request->request->add(['foto_sede' => $foto]);
        Sede::create($request->all());
        return redirect('admin/sede/crear')->with('mensaje', 'Sede creado con éxito');
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
        $data = Sede::findOrFail($id);
        return view('admin.sede.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarSede $request, $id)
    {
        
        $sede = Sede::findOrFail($id);

        
        if ($foto = Sede::setLogo($request->foto_up, $sede->foto_sede))
            $request->request->add(['foto_sede' => $foto]);
          

        $sede->update(array_filter($request->all()));
 
        return redirect('admin/sede')->with('mensaje', 'Sede actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request,$id)
    {

       //  dd($id);
        if ($request->ajax()) {
            $sede = Sede::findOrFail($id);
            $sede->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }
}
