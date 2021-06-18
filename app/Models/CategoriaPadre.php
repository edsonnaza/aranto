<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaPadre extends Model
{
    protected $table = 'categoriapadre';
    protected $fillable = ['id', 'nombre_categoriapadre','activo' ,'sede_id'];


    
     public function SubCategoriaHijos()
    {
        return $this->hasMany(CategoriaHijos::class, 'id_categoriapadre');
    } 
}
