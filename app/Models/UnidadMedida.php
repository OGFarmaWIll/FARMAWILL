<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadMedida extends Model
{
    use HasFactory;


    protected $table = 'twl_unidadmedida';
    protected $primaryKey = 'c_idunidadmedida';
    public $timestamps = false;

    protected $fillable = [
        'c_desc'
        
    ];

}
