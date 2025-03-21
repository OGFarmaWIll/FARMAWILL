<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class producto extends Model
{
    
    use HasFactory;

    protected $table = 'twl_productos'; 

    protected $primaryKey = 'c_idproducto'; 

    protected $fillable = [
        'c_codigobarras',
        'c_nombre',
        'c_idcategoria',
        'c_idlaboratorio',
        'c_idproveedor',
        'c_principal',
        'c_presentacion',
        'c_registrosanitario',
        'c_ubicacion',
        'c_lote',
        'c_fechavenc',
        'c_minimaeninv',
        'c_inventarioini',
        'c_imagen'
    ];

    public $timestamps = false; 
    

    public function categoria()
    {
        return $this->belongsTo(categorias::class, 'c_idcategoria');
    }

    public function laboratorio()
    {
        return $this->belongsTo(laboratorio::class, 'c_idlaboratorio');
    }

    public function proveedor()
    {
        return $this->belongsTo(proveedores::class, 'c_idproveedor');
    }

    public function presentaciones()
    {
        return $this->hasMany(presentacion::class, 'c_idproducto');
    }







    
}
