<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laboratorio extends Model
{
    use HasFactory;

    protected $table = 'twl_laboratorio';
    
    protected $primaryKey = 'c_idlaboratorio';

    protected $fillable = ['c_desc','c_tipo'];
    
    public $timestamps = false;

    
  

    


}
