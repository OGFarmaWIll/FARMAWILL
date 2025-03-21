<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class twl_cierrecaja extends Model
{
    use HasFactory;
    
    protected $table = 'twl_cierrecaja';

    protected $primaryKey = 'c_ID_Cierre';

    protected $fillable = [
        'c_fechacierre',
        'c_idusuariocierre',
        'c_Total_Final',
        'c_Comentarios'
    ];

  
    public $timestamps = false;


    public function ventas()
    {
        return $this->hasMany(twl_venta::class, 'c_ID_Cierre');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'c_idusuariocierre');
    }
    
}
