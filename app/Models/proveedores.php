<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class proveedores extends Model
{
    use HasFactory;

    protected $table = 'twl_proveedor';

    protected $primaryKey = 'c_idproveedor';

    protected $fillable = [
        'c_ruc',
        'c_desc',
        'c_direccion',
        'c_email',
        'c_telefono'
    ];

    public $timestamps = false;
    

    

  


}
