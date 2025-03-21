<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class categorias extends Model
{
    use HasFactory;

    protected $table = 'twl_categorias';

    // Definir la clave primaria correctamente
    protected $primaryKey = 'c_idcategoria';

    // Permitir asignación masiva en estos campos
    protected $fillable = ['c_desc', 'c_tipo'];

    // Si la tabla no tiene timestamps (created_at, updated_at)
    public $timestamps = false;


}
