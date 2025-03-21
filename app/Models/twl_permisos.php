<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twl_permisos extends Model
{
    protected $table = 'twl_permisos';
    protected $primaryKey = 'c_idpermiso';
    public $timestamps = false;

    protected $fillable = ['c_nombre', 'c_categoria'];

   
}
