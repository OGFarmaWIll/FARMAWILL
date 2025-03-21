<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class twl_venta extends Model
{
    use HasFactory;

    protected $table = 'twl_venta';

    protected $primaryKey = 'c_idventa';

    protected $fillable = [
        'c_iddoctor',
        'c_idcliente',
        'c_tipodoc',
        'c_descuentoADI',
        'c_tipopago',
        'c_subtotal',
        'c_descuento',
        'c_igv',
        'c_total',
        'c_idusuario',
        'c_fecharegistro',
        'c_detalle',
        'c_ID_Cierre'
    ];
    
    public $timestamps = false;

    public function TipoPago(){
        return $this->belongsTo(tipoPago::class, 'c_tipopago');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'c_idusuario');
    }

    public function detalleVenta()
    {
        return $this->hasMany(twl_ventadet::class, 'c_idventa');
    }

    public function cliente()
    {
        return $this->belongsTo(clientes::class, 'c_idcliente');
    }

    public function doctor()
    {
        return $this->belongsTo(doctores::class, 'c_iddoctor');
    }

   
}
