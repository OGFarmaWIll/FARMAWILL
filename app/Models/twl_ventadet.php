<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class twl_ventadet extends Model
{
    
    use HasFactory;

    protected $table = 'twl_ventadet';

    protected $primaryKey = 'c_idventadet';

    protected $fillable = [
        'c_idventa',
        'c_cantidad',
        'c_idunidadmedida',
        'c_ididproducto',
        'c_Preciounitario',
        'c_preciototal',
        'c_Desc'
    ];
    
    public $timestamps = false;

    
    public function producto()
    {
        return $this->belongsTo(producto::class, 'c_ididproducto', 'c_idproducto');
    }



   
}
