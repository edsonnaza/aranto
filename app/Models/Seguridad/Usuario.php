<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Sede;
use App\Models\Admin\Medico;
use App\Models\Persona;
 

class Usuario extends Authenticatable
{
    use Notifiable;
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'nombre', 'email', 'password', 'foto','sede_id','id_persona','id_medico'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }
    
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }




    public function setSession($roles)
    {

        $data = Sede::findOrFail($this->sede_id);
       
        Session::put([
            'usuario' => $this->usuario,
            'usuario_id' => $this->id,
            'nombre_usuario' => $this->nombre,
            'foto'=>$this->foto,
            'sede_id'=>$this->sede_id,
            'foto_sede'=>$data->foto_sede,      

            'nombre_sede'=>$data->nombre_sede
        ]);
        if (count($roles) == 1) {
            Session::put(
                [
                    'rol_id' => $roles[0]['id'],
                    'rol_nombre' => $roles[0]['nombre'],
                ]
            );
        } else {
            Session::put('roles', $roles);
        }
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public static function setFoto($foto, $actual = false)
    {
        if ($foto) {
            if ($actual) {
                Storage::disk('public')->delete("imagenes/usuarios/$actual");
            }
            $imageName = Str::random(20) . '.jpg';
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(530, 470, function ($constraint) {
                $constraint->upsize();
            });
            Storage::disk('public')->put("imagenes/usuarios/$imageName", $imagen->stream());
            return $imageName;
        } else {
            return false;
        }
    }




  

   

   
}
