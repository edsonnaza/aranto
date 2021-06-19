<?php

namespace App\Http\Controllers;
use App\Models\ComprasFI;
use Illuminate\Http\Request;

class ComprasFIController extends Controller
{
         public function index()
    {
        $datas = ComprasFI::All();
       // $sedes= Sede::All();
        return view('comprasfi.index', compact('datas'));
    }


       public function cargarhijos($id)
    {
        //dd($id);
        $data = CategoriaHijos::findOrFail($id);
        dd($data);
        // return view('catastros.categoriahijos.cargarhijos', compact('data'));  

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('crear-categoriapadre');
        return view('catastros.categoriapadre.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarCategoriaPadre $request)
    {
        $categoriapadre = CategoriaPadre::create($request->all());


     
   
    return redirect('categoriapadre/crear')->with('mensaje', 'El registro se creó correctamente');
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
        $padre = CategoriaPadre::findOrFail($id);
        return view('catastros.categoriapadre.editar', compact('padre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarCategoriaPadre $request,$id)
    { 
        
        CategoriaPadre::findOrFail($id)->update($request->all());
        return redirect('categoriapadre')->with('mensaje', 'Registro actualizado con éxito');
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
        $categoriapadre = CategoriaPadre::findOrFail($id);
        $categoriapadre->delete();
        return response()->json(['mensaje' => 'ok']);
     } else {
        abort(404);
    }
    }
}
