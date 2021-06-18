<?php

namespace App\Http\Controllers;
use App\Models\Seguro;
use App\Models\Productos;
use App\Models\CategoriaPadre;
use App\Models\CategoriaHijos;
use App\Models\PrecioProductos;
use App\Models\Existencias;
use App\Models\MedidasBasicas; 
use App\Models\Unidad;
use App\Models\Iva;

use Illuminate\Http\Request;
use App\Http\Requests\ValidarProducto;
use App\Http\Requests\ValidarPrecioPorSeguro;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Productos::where('id_prodcategoriapadre', 4)->orWhere('id_prodcategoriapadre', 5)->get();
//with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();
        $categoriapadre = CategoriaPadre::All();
        $categoriahijos = CategoriaHijos::All();
        $medidasbasicas = MedidasBasicas::All();

// $sedes= Sede::All();
//   $categoriapadre = CategoriaPadre::orderBy('id')->pluck('nombre_categoriapadre', 'id')->toArray();

        return view('catastros.articulos.index', compact('datas', 'categoriapadre', 'categoriahijos', 'medidasbasicas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        // dd('articulos crear');
           // return view('hola');
        $categoriapadre = CategoriaPadre::where('id', 4)->orWhere('id', 5)->get();

        $seguro = Seguro::All();
        $categoriahijos = CategoriaHijos::All();
        $medidasbasicas = MedidasBasicas::All();
        $unidades=Unidad::All();
        $ivas=Iva::All();

        //$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();

        return view('catastros.articulos.crear', compact('seguro', 'categoriapadre', 'categoriahijos', 'medidasbasicas','unidades','ivas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
       //   protected $fillable = ['producto_nombre', 'producto_descripcion', 'id_prodcategoriapadre', 'id_categoriahijo',
// 'id_medidasbasicas', 'sede_id'];

     
       // dd($unidad);
         $producto = Productos::create([
                'producto_nombre' => $request->producto_nombre,
                'producto_descripcion' => $request->producto_descripcion,
                'id_prodcategoriapadre' => $request->id_prodcategoriapadre,
                'id_categoriahijo' => $request->id_categoriahijo,
                'id_medidasbasicas' => $request->id_medidasbasicas,
                'sede_id' => $request->sede_id,
                'id_iva'=>$request->id_iva,

            ]);
            $producto->save();
         
            $id_producto=$producto->id;
           
            $unidad = Unidad::Where('activo', true)->pluck('id','nombre_unidad');
    
  


        //var_dump($datos);
       foreach ($unidad as $nombre_unidad => $id_unidad) {
                    $existencias = Existencias::create([
                    'id_producto' => $id_producto,
                    'cantidad_minima' => '5',
                    'cantidad' => '0.0000',
                    'id_unidad' => $id_unidad,
                    'sede_id' => $request->sede_id,
                  


                        ]);
                          $existencias->save();
                       

            }
              
 

return redirect('articulos/crear')->with('mensaje', 'Registro creado con éxito'); 

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
        $producto = Productos::findOrFail($id);
        $articulo = Productos::findOrFail($id);
        $ivas=Iva::All();

            // $data=Productos::with('Clasificacion')->findOrFail($id);
            //$foto_persona=$data->foto_persona;
            $precioproducto = PrecioProductos::Where('id_producto', $id)->get();
            ($precioprod = $producto->PrecioProductos($id));

            $categoriapadre = CategoriaPadre::All();
            $seguro = Seguro::All();
            $categoriahijos = CategoriaHijos::All();
            $medidasbasicas=MedidasBasicas::All();
            // $clasificacion=Clasificacion::All();
            //$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();
            //$especialidades = Especialidad::All();

            //$nacionalidad=Nacionalidad::All();
            //$generos=Genero::All();
            //dd($data);
            $stock=$producto->stock($id);

            return view('catastros.articulos.editar', compact('precioprod', 'producto', 'precioproducto', 'seguro', 'categoriapadre', 'categoriahijos','medidasbasicas','articulo','ivas','stock'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarProducto $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $producto->producto_nombre = $request->producto_nombre;
        $producto->producto_descripcion = $request->producto_descripcion;
        $producto->id_prodcategoriapadre = $request->id_prodcategoriapadre;
        $producto->id_categoriahijo = $request->id_categoriahijo;
        $producto->id_medidasbasicas = $request->id_medidasbasicas;
        $producto->sede_id = $request->sede_id;
        $producto->id_iva = $request->id_iva;
             

        $producto->update();

        return redirect('articulos')->with('mensaje', 'Registro actualizado con éxito');

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
