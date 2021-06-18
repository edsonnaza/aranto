<?php

namespace App\Http\Controllers;
 
use App\Models\Productos;
use App\Models\CategoriaPadre;
use App\Models\CategoriaHijos;
use App\Models\PrecioProductos;
use App\Models\Seguro;
use App\Models\Existencias;
use App\Models\MedidasBasicas;


 



use Illuminate\Http\Request;

class ExistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Productos::where('id_prodcategoriapadre', 4)->orWhere('id_prodcategoriapadre', 5)->get();
; //with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();
        $categoriapadre = CategoriaPadre::All();
        $categoriahijos = CategoriaHijos::All();
        $medidasbasicas = MedidasBasicas::All();

// $sedes= Sede::All();
//   $categoriapadre = CategoriaPadre::orderBy('id')->pluck('nombre_categoriapadre', 'id')->toArray();
 
return view('catastros.articulos.index', compact('datas', 'categoriapadre', 'categoriahijos','medidasbasicas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {


       // dd('articulos crear');

        $categoriapadre = CategoriaPadre::All();
$seguro = Seguro::All();
$categoriahijos = CategoriaHijos::All();
$medidasbasicas = MedidasBasicas::All();


//$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();

return view('catastros.articulos.crear', compact('seguro', 'categoriapadre', 'categoriahijos','medidasbasicas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }
}
