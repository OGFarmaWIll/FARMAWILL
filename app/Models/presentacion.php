<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class presentacion extends Model
{
    use HasFactory;

    protected $table = 'twl_presentacion';
    protected $primaryKey = 'id_presentacion';
    public $timestamps = false;

    protected $fillable = [
        'c_idunidadmedida',
        'c_idproducto',
        'c_preciocompra',
        'c_gananciaunidad',
        'c_preciounidad',
        'c_comisionunidad',
        'c_cantidadunidad'
    ];

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'c_idunidadmedida', 'c_idunidadmedida');
    }


}
