<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;

    protected $table = 'twl_clientes';
    
    protected $primaryKey = 'c_idcliente';
    
    protected $fillable = ['c_iddni', 'c_nombres', 'c_direccion', 'c_email', 'c_telefono'];

    public $timestamps = false;


    // CREATE TABLE twl_clientes (
    //     c_idcliente INT PRIMARY KEY AUTO_INCREMENT,
    //     c_iddni VARCHAR(20),
    //     c_nombres VARCHAR(100),
    //     c_direccion VARCHAR(100),
    //     c_email VARCHAR(50),
    //     c_telefono VARCHAR(20)
    // );

    

}
