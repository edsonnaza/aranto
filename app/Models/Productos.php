<?php

namespace App\Models;
use App\Models\Existencias;
use App\Models\PrecioProductos;
use App\Models\Seguro;
use App\Models\Unidad;
use App\Models\CategoriaPadre;
use App\Models\CategoriaHijos;
use App\Models\ComprasFIDET;



use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{     
        protected $table = "productos";
        protected $fillable = ['producto_nombre', 'producto_descripcion', 'id_prodcategoriapadre', 'id_categoriahijo', 'id_medidasbasicas','id_iva' ,'sede_id'];


      public function PrecioProductos($id_producto)
    {
       // return $this->belongsToMany(Existencias::class, 'existencias','id')->wherePivot('id_producto');
           /* return $this->belongsToMany(PrecioProductos::class,'precio_productos','id_producto')->get();

            $users = User::join("roles", "users.roles_id", "=", "roles.id")
    ->where('users.estado', '=', 1)
    ->get();*/

    return Seguro::join("precio_productos","seguros.id","=","precio_productos.id_seguro")->where('precio_productos.id_producto','=',$id_producto)->get();


   
    }

          public function ExitenciaProductos()
    {
       // return $this->belongsToMany(Existencias::class, 'existencias','id')->wherePivot('id_producto');
            //return $this->belongsToMany(Existencia::class, 'id_producto')->withPivot('existencias')->get();
        return $this->hasToMany(Existencias::class, 'existencias','id_producto');

   
    }


      public function ExistenciaProductos()
    {
        return $this->hasMany(Existencias::class, 'id_producto')->get();
         //   return $this->hasMany(PrecioProductos::class,'id','id_producto');

       //  return $this->belongsToMany(Existencias::class, 'existencias', 'id_producto')->get();
          
   
    }

          public function PrecioPorSeguro()
    {
       // return $this->belongsToMany(PrecioProductos::class)->wherePivot('id_producto')->get();
            return $this->hasMany(PrecioProductos::class,'id_producto')->get();

       //  return $this->belongsToMany(Existencias::class, 'existencias', 'id_producto')->get();
          
   
    }


     public function precios(){
        return $this->hasMany(Productos::class,'precio_productos','id_producto')
            ->withPivot('id_producto')->get();
    }
    public function seguro(){
        return $this->belongsToMany(Seguro::class,'precio_productos')
            ->withPivot('id_producto','id_seguro')->get(); 
    }


      public function CategoriaPadre()
    {
        return $this->hasOne(CategoriaPadre::class, 'id')->get();
         //   return $this->hasMany(PrecioProductos::class,'id','id_producto');

       //  return $this->belongsToMany(Existencias::class, 'existencias', 'id_producto')->get();
          
   
    }

    public function get()
    {
        $categoriapadres = CategoriaPadre::get();
        $categoriapadresArray[''] = 'Selecciona una categoria';
        foreach ($categoriapadres as $catpadres) {
            $categoriapadresArray[$catpadres->id] = $catpadres->nombre_categoriapadre;
        }
        return $categoriapadresArray;
    }



      public function stock($id_producto){

          $stock = Unidad::select('existencias.cantidad', 'unidad.nombre_unidad')
    ->join('existencias', 'existencias.id_unidad', '=', 'unidad.id')
    ->where('existencias.id_producto',$id_producto)
    ->get();
       // $stockArray[]='';
    foreach ($stock as $stk) {
    $stockArray[$stk->cantidad] = $stk->nombre_unidad;
}


return $stock;


      }


        public function comprasficab()
    {
        return $this->belongsToMany('ComprasFI');
    }



    public function shops()
    {
        return $this->belongsToMany('Shop');
    }

}
