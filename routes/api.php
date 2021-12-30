<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Productos;
use App\Models\ComprasFIDET;
use App\Models\ComprasFI;

 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/search',function(Request $request){
 $query=$request->search;
 $data = Productos::where('producto_nombre','like','%'.$query.'%')->get();
 return response()->json($data);
});



Route::get('/comprasfidet',function(Request $request){
 $query=$request->id_apertura;
 $data = ComprasFIDET::where('id_apertura','=',$query)->where('eliminado','=','NO')->get();
 return response()->json($data);
});


Route::get('/comprasficabdet',function(Request $request){
 //$query=$request->id_apertura;
 $data = ComprasFI::whereHas('Productos')->get();
 return response()->json($data);
});
//Route::resource('comprasfi', 'TaskController', ['except' => 'show', 'create', 'edit']);