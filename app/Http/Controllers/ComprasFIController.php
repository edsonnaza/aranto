<?php

namespace App\Http\Controllers;
use App\Models\ComprasFI;
use App\Models\Unidad;
use App\Models\Persona;
use App\Models\Clasificacion;
use App\Models\TipoDocumentos;
use Illuminate\Http\Request;

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
       // return view('catastros.comprasfi.crear');
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
