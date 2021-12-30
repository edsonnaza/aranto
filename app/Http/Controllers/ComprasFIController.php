<?php

namespace App\Http\Controllers;
use App\Models\ComprasFI;
use App\Models\Unidad;
use App\Models\Persona;
use App\Models\Clasificacion;
use App\Models\TipoDocumentos;
use App\Models\Productos;
use App\Models\CategoriaPadre;
use App\Models\Existencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComprasFIController extends Controller
{
         public function index()
    {
        $datas = ComprasFI::All();
       // dd($datas);
        $almacenes=Unidad::All();
        $tipodocumentos=TipoDocumentos::where('activo',true)->get();
        //$proveedor=Persona::belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion')->where('id_clasificacion',4)->get();
      //  $personas=Persona::All();
        // $sedes= Sede::All();
        $proveedores=Persona::whereHas('ClasificacionProveedor')->get();
        // dd($proveedor);
       return view('comprasfi.index', compact('datas','almacenes','proveedores','tipodocumentos'));

     // return ComprasFI::get();
    }



    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request)
    {  // protected $fillable = ['id_unidad_origen','id_unidad_destino','id_proveedor','id_tipodocumento',
        //'numero_documento','descripcion_documento','importe_totalcompra','descuento_total','fecha_documento',
        //'id_usuariorecibio','usuario_recibio','id_usuariocreado','usuario_creado',
        //'id_usuariotermino','usuario_termino','pendiente_entrega','terminado','clave_verificado',
        //'fecha_terminado','eliminado','id_usuarioelimino','usuario_elimino','id_usuarioactualizo',
        //'usuario_actualizo','sede_id'];

        //dd($request);
        $comprasfi_cab = ComprasFI::create($request->all());


       // can('crear-categoriapadre');
       return redirect('comprasfi')->with('mensaje', 'El registro se creó correctamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarCategoriaPadre $request)
    {
        $comprasfi_cab = ComprasFI::create($request->all());


     
   
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
        $comprasfi_cab = ComprasFI::findOrFail($id);

        $almacenes=Unidad::All();
        $tipodocumentos=TipoDocumentos::where('activo',true)->get();
        //$proveedor=Persona::belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion')->where('id_clasificacion',4)->get();
      //  $personas=Persona::All();
        // $sedes= Sede::All();
        $proveedores=Persona::whereHas('ClasificacionProveedor')->get();
         
        return view('comprasfi.editar', compact('comprasfi_cab','almacenes','tipodocumentos','proveedores'));
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
 

    /* public function productosDisponibles(Request $request)
    {
    	$productos = [];

        if($request->has('q')){
            $search = $request->q;
            $productos =Productos::select("id", "producto_nombre")
            		->where('producto_nombre', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($productos);
    }*/

      public function viewBuscarProductos(){
          //  return view('vue');


      }


      public function vueForm(){
         return view('vue');
          }

          public function buscarArticulos(Request $request)
    {
      //  $datas = ComprasFI::All();
       // dd($datas);
      //  $almacenes=Unidad::All();
     //   $tipodocumentos=TipoDocumentos::where('activo',true)->get();
        //$proveedor=Persona::belongsToMany(Clasificacion::class, 'clasificacion_persona','id_persona','id_clasificacion')->where('id_clasificacion',4)->get();
      //  $personas=Persona::All();
        // $sedes= Sede::All();
      //  $proveedores=Persona::whereHas('ClasificacionProveedor')->get();
        // dd($proveedor);
     //  return view('search');//, compact('datas','almacenes','proveedores','tipodocumentos'));

     // return ComprasFI::get();




       $search = $request->search;

       if ($request->ajax()) {
      if($search == ''){
         $autocomplate = Productos::orderby('producto_nombre','asc')->select('id','producto_nombre')->limit(5)->get();
      }else{
         $autocomplate = Productos::orderby('producto_nombre','asc')->select('id','producto_nombre')->where('producto_nombre', 'like', '%' .$search . '%')->limit(5)->get();
      }
        
      $response = array();
    // var_dump($response);
      foreach($autocomplate as $autocomplate){
         $response[] = array("id"=>$autocomplate->id,"producto_nombre"=>$autocomplate->producto_nombre);
      }
         
    //  echo json_encode($response);
        return response()->json($response);
        // console.log('Component mounted.');
      exit;
   }


  // Log::info('This is some useful information.');
    
    }

      

     public function getAutocomplete(Request $request){

      $search = $request->search;

      // if ($request->ajax()) {
      if($search == ''){
         $autocomplate = Productos::orderby('producto_nombre','asc')->select('id','producto_nombre')->limit(5)->get();
      }else{
         $autocomplate = Productos::orderby('producto_nombre','asc')->select('id','producto_nombre')->where('producto_nombre', 'like', '%' .$search . '%')->limit(5)->get();
      }
        
      $response = array();
    // var_dump($response);
      foreach($autocomplate as $autocomplate){
         $response[] = array("id"=>$autocomplate->id,"producto_nombre"=>$autocomplate->producto_nombre);
      }
         
    //  echo json_encode($response);
        return response()->json($response);
        // console.log('Component mounted.');
      exit;
   //}


  // Log::info('This is some useful information.');
    }

        function list(Request $request)
    {
      //  if($request->get('query')){
         //   $query  = $request->get('query');
        if ($request->get('query')) {
            $data = $request->get('query');
           /* $data = DB::table('productos')
                ->where('producto_nombre', 'LIKE', "%{$data}%")
                ->get();*/
//            dd($data);

 $data = Productos::where('producto_nombre','like','%'.$data.'%')->select('id','producto_nombre','id_prodcategoriapadre')->get();
 
 //return response()->json($data);
            $output=array();
            $output = '<ul class="list-group" style="display:block; position:relative">';
            foreach ($data as $row) {

             $catpadres = CategoriaPadre::find($row->id_prodcategoriapadre);
             $catnombre=$catpadres->nombre_categoriapadre;
            $existencia = Existencias::where('id_producto','=',$row->id)->where('id_unidad','=',1)->get();
             $cantidad_unidad=0;

             foreach ($existencia as $exist) {
             $cantidad_unidad=$exist->cantidad;
              //var_dump($existencia);
               }
              $output .= '

            <li class="list-group-item">  <a href="#" class="ml-2" id='.$row->id.'  style="color:black;font-weight: bold; font-size: 10px;">' . $row->producto_nombre . '</a> <input type="hidden" id="id_catpadre" value='.$row->id_prodcategoriapadre .'><input type="hidden" id="catnombre" value='.$catnombre .'><input type="hidden" id="cantidad" value='.$cantidad_unidad .'> </li>';
             
            }
            $output .= '</ul>';
            echo $output;
           // echo json($output);
        }
    }



    public function autocompleteProducto(Request $request){
    $term = $request->get('term');

    $querys = Productos::where('producto_nombre', 'LIKE', '%' . $term . '%')->get();

    $data = [];

    foreach ($querys as $querys) {
        $data[] = [
            'label' => $querys->producto_nombre,
            'value' => $querys->id
        ];
    }

    return $data;
}



   
}
