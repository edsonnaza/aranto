<?php

namespace App\Http\Controllers;
use App\Models\CategoriaHijos;
use App\Models\CategoriaPadre;
use App\Http\Requests\ValidarCategoriaHijos;




use Illuminate\Http\Request;

class CategoriaHijosController extends Controller
{
    public function index($id)
    {   $datas = CategoriaHijos::findOrFail($id);
          //  dd($data);
       // $datas = CategoriaPadre::All();
       // $sedes= Sede::All(


        return view('catastros.categoriahijos.index', compact('datas'));
    }


       public function cargarhijos($id)
    {
        //dd($id);
        $data = CategoriaHijos::findOrFail($id);
       // dd($data);
        // return view('catastros.categoriahijos.cargarhijos', compact('data'));  

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
    {$padre = CategoriaPadre::where('id', $id)->get();

          // dd(compact('padre'));
        can('crear-categoriahijo');
        return view('catastros.categoriahijos.crear', compact('padre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarCategoriaHijos $request)
    {
        
      //  dd(compact('request'));

        $categoriahijo = CategoriaHijos::create($request->all());

     // $id=$request->id_categoriapadre;
    // $padre = CategoriaPadre::where('id', $request->id_categoriapadre)->get();
        // can('crear-categoriahijo');

$id = ['id' => $request->id_categoriapadre]; // ejemplo, si la ID fuera 1
/*return redirect()
    ->action('CategoriaHijosController@crear', $id)
    ->with('mensaje', 'El registro se creó correctamente');*/
$padre = CategoriaPadre::where('id', $id)->get();

         return view('catastros.categoriahijos.crear', compact('padre','id'))->with('mensaje', 'El registro se creó correctamente');

   
   // return redirect('categoriahijos/crear/')->with('mensaje', 'El registro se creó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
      // $datas = CategoriaPadre::with('SubCategoriaHijos')->findOrFail($id)->toArray();
       $hijos=CategoriaHijos::where('id_categoriapadre',$id)->get();
       $padre=CategoriaPadre::where('id',$id)->get();
     //  dd(compact('padre','hijos'));

       return view('catastros.categoriahijos.cargarhijos', compact('padre','hijos'));

      // $datos = CategoriaPadre::with('SubCategidoriaHijos')->findOrFail($id)->pluck('id','nombre_categoriapadre');
//$datos = Arr::dot(['carro' => ['marca' => 'honda', 'color' => 'negro']]);

//$color = Arr::pluck($info, 'carro.color');

//print_r($datos);


       
  //dd($datas->nombre_categoriapadre );
  

 

// $datas = CategoriaPadre::All();
// $sedes= Sede::All();
     return view('catastros.categoriahijos.cargarhijos', compact('datos'));        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {   
        //$hijos = CategoriaHijos::where('id', $id)->get();
        
        $hijos= CategoriaHijos::findorfail($id);
        
      //dd(  $hijoid=CategoriaHijos::findorfail($id));
     // foreach ($hijos as $key => $value) {
        // $id_categoriapadre=$value->id_categoriapadre;
     // }
       // dd($id_categoriapadre);
//dd(compact($hijoid->id_categoriapadre));
        $padre = CategoriaPadre::where('id',$hijos->id_categoriapadre)->get();
        //dd(compact('padre'));
       return view('catastros.categoriahijos.editar', compact('hijos','padre','id')) ;
        
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPersona  $tipoPersona
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarCategoriaHijos $request,$id)
    { 
        
        CategoriaHijos::findOrFail($id)->update($request->all());
        
      //$id = ['id'=>$id,'id_categoriapadre' => $request->id_categoriapadre]; // ejemplo, si la ID fuera 1
      
            $id=$request->id_categoriapadre;
       $hijos=CategoriaHijos::where('id_categoriapadre',$id)->get();
       $padre=CategoriaPadre::where('id',$id)->get();
      //dd(compact('padre','hijos','id'));

       //return view('catastros.categoriahijos.cargarhijos', compact('padre','hijos'))->with('mensaje', 'El registro actualizado con éxito');

    //$id = ['id' => $request->id_categoriapadre]; // ejemplo, si la ID fuera 1
  //  $padre = CategoriaPadre::where('id', $id)->get();

         return view('catastros.categoriahijos.cargarhijos', compact('hijos','padre'))->with('mensaje', 'El registro actualizado con éxito');
       //   return view('catastros.categoriahijos.cargarhijos', compact('datos'))->with('mensaje', 'El registro actualizado con éxito');     

       // return redirect('categoriapadre')->with('mensaje', 'Registro actualizado con éxito');
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
        $categoriahijo = CategoriaHijos::findOrFail($id);
        $categoriahijo->delete();
        return response()->json(['mensaje' => 'ok']);
     } else {
        abort(404);
    }
    }
}
