<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class doctores extends Model
{
    use HasFactory;

    protected $table = 'twl_doctor';

    protected $primaryKey = 'c_iddoctor';

    protected $fillable = [
        'c_nombres',
        'c_cmp',
        'c_especialidad',
        'c_direccion',
        'c_email',
        'c_telefono'
    ];

    public $timestamps = false;


  

}
