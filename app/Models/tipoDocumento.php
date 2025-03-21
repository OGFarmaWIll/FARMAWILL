<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tipoDocumento extends Model
{
    use HasFactory;
    

    protected $table = 'twl_tipodocumento';

    protected $primaryKey = 'c_tipodoc';

    protected $fillable = [
        'c_desc'
    ];
    
    public $timestamps = false;



}
