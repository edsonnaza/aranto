<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CategoriaHijos extends Model
{
    protected $table = 'categoriahijos';
    protected $fillable = ['nombre_categoriahijo','id_categoriapadre','activo' ,'sede_id'];


     
     public function CategoriaHijos()
    {
        return $this->hasOne(CategoriaHijos::class, 'CategoriaPadre','id_categoriapadre');
        

    }

    public function CatHijos($idpadre){
        return $this->where('id_categoriapadre', '$idpadre')->all();

    }
}
