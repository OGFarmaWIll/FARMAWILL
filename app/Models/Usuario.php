<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'twl_usuarios'; 
    protected $primaryKey = 'c_idusuario'; 
    public $timestamps = false; 

    protected $fillable = [
        'c_nombre',
        'c_apellidos',
        'c_login',
        'c_pass',
        'c_estado'
    ];

    public function getAuthPassword()
    {
        return $this->c_pass;
    }


    protected $with = ['usuarioRoles.roles.roles_permisos.permisos'];



    public function usuarioRoles(): HasMany
    {
        return $this->hasMany(twl_usuario_roles::class, 'c_idusuario', 'c_idusuario');
    }

    public function tienePermiso($permisoNombre)
    {
        foreach ($this->usuarioRoles as $usuarioRol) {
            if (isset($usuarioRol->roles->roles_permisos)) {
                foreach ($usuarioRol->roles->roles_permisos as $permiso) {
                    if (isset($permiso->permisos) && $permiso->permisos->c_nombre === $permisoNombre) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
    
    
}
