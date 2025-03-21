<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twl_rol_permisos extends Model
{
    protected $table = 'twl_rol_permisos';

    protected $primaryKey = 'c_id';

    public $timestamps = false;

    protected $fillable = ['c_idrol', 'c_idpermiso'];


    public function permisos(){
        return $this->belongsTo(twl_permisos::class, 'c_idpermiso');
    }
 

    

}



