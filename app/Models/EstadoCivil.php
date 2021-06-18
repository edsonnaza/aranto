<?php


namespace app\Models;
use app\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estadocivil';
    protected $fillable = ['id', 'nombre_estadocivil','activo' ,'sede_id'];

    public function personas()
    {
        return $this->hasMany(Persona::class,'id');
    }
}
