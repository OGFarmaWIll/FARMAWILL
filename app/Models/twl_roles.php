<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twl_roles extends Model
{
    protected $table = 'twl_roles';
    protected $primaryKey = 'c_idrol';
    public $timestamps = false;

    protected $fillable = ['c_descr'];
    
   
    public function roles_permisos(){
        return $this->hasMany(twl_rol_permisos::class, 'c_idrol', 'c_idrol');
    }


}


