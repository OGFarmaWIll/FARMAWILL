<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class twl_usuario_roles extends Model
{
    protected $table = 'twl_usuario_roles';
    protected $primaryKey = 'c_id';
    public $timestamps = false;

    protected $fillable = [
        'c_idusuario',
        'c_idrol'
    ];

  public function roles()
  {
    return $this->belongsTo(twl_roles::class, 'c_idrol');
  }



}




