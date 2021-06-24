<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentos extends Model
{
    use HasFactory;
     protected $table = 'tipo_documento';
    protected $fillable = ['documento_nombre','sede_id'];
}
