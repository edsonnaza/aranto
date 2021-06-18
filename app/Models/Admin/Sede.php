<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Seguridad\Usuario;
//use App\Models\Seguridad\Usuario;
 
//use App\Models\Seguridad\Usuario;

class Sede extends Model
{
    protected $table = "sedes";
    protected $fillable = ['id', 'nombre_sede', 'direccion', 'foto_sede','ruc','telefono','email'];

    /*public function usuario()
    {
       // return $this->hasMany(Usuario::class);
    }*/

    public static function setLogo($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/logo_sedes/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/logo_sedes/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class,'sede_id');
    }
}
