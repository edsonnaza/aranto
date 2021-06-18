<?php

namespace App\Http\Controllers;
use App\Models\Productos;
use App\Models\CategoriaPadre;
use App\Models\CategoriaHijos;
use App\Models\PrecioProductos;
use App\Models\Seguro;
use App\Models\Existencias;
use App\Http\Requests\ValidarProducto;

use App\Http\Requests\ValidarPrecioPorSeguro;




use Illuminate\Http\Request;

class ProductosController extends Controller
{
        public function index()
    {
        $datas = Productos::whereNotBetween('id_prodcategoriapadre',['4','5'])->get();//with('personas:id,paciente_nombre,nro_mobil,email,nro_telefono,direccion')->orderBy('id')->get();
        $categoriapadre=CategoriaPadre::All();
        $categoriahijos = CategoriaHijos::All();

        // $sedes= Sede::All();
     //   $categoriapadre = CategoriaPadre::orderBy('id')->pluck('nombre_categoriapadre', 'id')->toArray();

         return view('catastros.productos.index', compact('datas','categoriapadre','categoriahijos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //$producto = Productos::findOrFail($id);
         
     //   $precioproducto = PrecioProductos::Where('id_producto', $id)->get();
        //$precioprod = $producto->PrecioProductos();
        $categoriapadre = CategoriaPadre::All();
        $seguro = Seguro::All();
        $categoriahijos = CategoriaHijos::All();

       
      
       

        //$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();




         return view('catastros.productos.crear', compact( 'seguro',  'categoriapadre','categoriahijos' ));

    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear_precioseguro($id)
    {
         $producto = Productos::findOrFail($id);
         
     //   $precioproducto = PrecioProductos::Where('id_producto', $id)->get();
        //$precioprod = $producto->PrecioProductos();
        $categoriapadre = CategoriaPadre::All();
        $seguro = Seguro::All();
        $categoriahijos = CategoriaHijos::All();

       
      
       

        //$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();




         return view('catastros.productosprecios.crear', compact( 'seguro',  'categoriapadre','categoriahijos','producto' ));

    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_nuevoprecioporseguro(ValidarPrecioPorSeguro $request,$id_producto)
    {  // protected $table = "precio_productos";
         //    protected $fillable = ['id_producto','id_seguro','precio_venta',
         //'id_usuarioelimino','usuario_elimino','id_usuarioactualizo','usuario_actualizo', 'sede_id'];
         $producto=Productos::findorfail($id_producto);
         $id_categoriapadre=$producto->id_prodcategoriapadre;

         $request->request->add(['id_producto' => $id_producto]);
        //dd($request);

        $precio_productos=PrecioProductos::create([
            'id_producto' =>$request->id_producto,
            'id_seguro'=>$request->id_seguro,
            'precio_venta'=>$request-> precio_venta,
            'precio_costo'=>$request-> precio_costo,
            'sede_id'=>$request->sede_id,
         
            
            ]);
            $precio_productos->save();

         //   $persona->Clasificacion()->sync($request->id_clasificacion);

           // $persona=Persona::last();
           // $request->request->add(['id_persona'=>$persona->id]);
           // protected $fillable = ['paciente_nombre', 'id_persona','sede_id'];
         /* $paciente=Paciente::create([
           
            'id_persona'=>$persona->id,
            'paciente_nombre'=>$request->persona_nombre.' '.$request->persona_apellido,
            'sede_id'=>$request->sede_id
             
            
            ]);*/
           /// $persona->roles()->sync($request->rol_id);
//editar_precioproducto", ['id' => $prodprecio->id]
                if ($id_categoriapadre=='5' || $id_categoriapadre=='4') {
                    # code...
                    return redirect('articulos')->with('mensaje', 'Registro creado con éxito');

                } else {
                            return redirect('productos')->with('mensaje', 'Registro creado con éxito');

                }

        
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

        $producto=Productos::create([
            'producto_nombre' =>$request->producto_nombre,
            'producto_descripcion'=>$request->producto_descripcion,
            'id_prodcategoriapadre'=>$request-> id_prodcategoriapadre,
            'id_categoriahijo'=>$request->id_categoriahijo,
            'id_medidasbasicas'=>$request->id_medidabasicas,
            'sede_id'=>$request->sede_id,
            'id_iva'=>$request->id_iva,
         
            
            ]);
            $producto->save();

         //   $persona->Clasificacion()->sync($request->id_clasificacion);

           // $persona=Persona::last();
           // $request->request->add(['id_persona'=>$persona->id]);
           // protected $fillable = ['paciente_nombre', 'id_persona','sede_id'];
         /* $paciente=Paciente::create([
           
            'id_persona'=>$persona->id,
            'paciente_nombre'=>$request->persona_nombre.' '.$request->persona_apellido,
            'sede_id'=>$request->sede_id
             
            
            ]);*/
           /// $persona->roles()->sync($request->rol_id);


        return redirect('productos/crear')->with('mensaje', 'Registro creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
      
        $producto=Productos::findOrFail($id);
        // $data=Productos::with('Clasificacion')->findOrFail($id);
         //$foto_persona=$data->foto_persona;
         $precioproducto= PrecioProductos::Where('id_producto',$id)->get();
        ($precioprod=$producto->PrecioProductos($id));
      

        
         
         $categoriapadre=CategoriaPadre::All();
         $seguro=Seguro::All();
         $categoriahijos=CategoriaHijos::All();
         //$profesion=Profesion::All();
        // $clasificacion=Clasificacion::All();
        //$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();
        //$especialidades = Especialidad::All();

        //$nacionalidad=Nacionalidad::All();
         //$generos=Genero::All();
         //dd($data);
         
        return view('catastros.productos.editar', compact('precioprod','producto', 'precioproducto','seguro','categoriapadre','categoriahijos'));
 
    }




     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function editar_precioproducto($id)
    {
     // dd($id);
       
        // $data=Productos::with('Clasificacion')->findOrFail($id);
         //$foto_persona=$data->foto_persona;
       ($precioprod= PrecioProductos::findOrFail($id));

        $producto=Productos::findOrFail($precioprod->id_producto);

       //($precioprod=$producto->PrecioProductos($id));
        
      

        
         
         $categoriapadre=CategoriaPadre::All();
         $seguro=Seguro::All();
         $categoriahijos=CategoriaHijos::All();
         //$profesion=Profesion::All();
        // $clasificacion=Clasificacion::All();
        //$clasificacion = Clasificacion::orderBy('id')->pluck('nombre_clasificacion', 'id')->toArray();
        //$especialidades = Especialidad::All();

        //$nacionalidad=Nacionalidad::All();
         //$generos=Genero::All();
         //dd($data);
         
       return view('catastros.productosprecios.editar', compact('precioprod','producto',  'seguro','categoriapadre','categoriahijos'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function actualizar_producto(ValidarProducto $request, $id)
    {
          
         $producto=Productos::findOrFail($id);

         $producto->producto_nombre= $request->producto_nombre;
         $producto->producto_descripcion=$request->producto_descripcion;
         $producto->id_prodcategoriapadre=$request-> id_prodcategoriapadre;
         $producto->id_categoriahijo=$request->id_categoriahijo;
         $producto->id_medidasbasicas=$request->id_medidabasicas;
         $producto->sede_id=$request->sede_id;
   
        $producto->update();
 
   
         return redirect('productos')->with('mensaje', 'Registro actualizado con éxito');
    }




/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function actualizar_precioproducto(ValidarPrecioPorSeguro $request, $id)
    {
          // dd($request);
          

           
            $precioproducto=PrecioProductos::findOrFail($id);
            $producto = Productos::findOrFail($precioproducto->id_producto);
            $id_categoriapadre = $producto->id_prodcategoriapadre;  


            $precioproducto->id_seguro = $request->id_seguro;
            $precioproducto->precio_costo = $request->precio_costo;
            $precioproducto->precio_venta = $request->precio_venta;
            // $precioproducto->update(array_filter($request->all()));
            $precioproducto->update();

        
            if ($id_categoriapadre == '5' || $id_categoriapadre == '4') {
   
                   return redirect('articulos')->with('mensaje', 'Registro creado con éxito');

            } else {
                    return redirect('productos')->with('mensaje', 'Registro creado con éxito');

                    }

   
         
    }


    

     public function eliminar_producto(Request $request, $id)
    {  //dd($id);
        if ($request->ajax()) {
           // dd($id);
            $existencia=Existencias::where('id_producto', $id)->delete();


            
            
            $productos = Productos::findOrFail($id);

           // var_dump($productos);
      
            $productos->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function eliminar_precioporseguro(Request $request, $id)
    {  
        if ($request->ajax()) {
            //dd($id);

            $precio_productos = PrecioProductos::findOrFail($id);
            //$precio_productos->Clasificacion()->detach();
            $precio_productos->delete();
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }




       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
   


 public function buscar_cathijos(Request $request)
    { //dd($request);
        if ($request->ajax()) {
            $categoriahijos = CategoriaHijos::where('id_categoriapadre', $request->id_categoriapadre)->get();
            foreach ($categoriahijos as $cathijos) {
                $cathijosArray[$cathijos->id] = $cathijos->nombre_categoriahijo;
            }
            return response()->json($cathijosArray);
        }
    }



    
}
