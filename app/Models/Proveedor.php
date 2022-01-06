<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Sede;
use App\Persona;


class Proveedor extends Model
{
    use HasFactory;
    protected $table = "proveedores";
    protected $fillable = ['proveedor_nombre', 'id_persona','ruc','sede_id'];

     public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
    public function sede()
    {
        return $this->hasOne(Sede::class, 'sede_id');
    }
}
