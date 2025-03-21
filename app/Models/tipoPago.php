<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class tipoPago extends Model
{
    use HasFactory;
    
    protected $table = 'twl_tipopago';

    protected $primaryKey = 'c_tipopago';

    protected $fillable = [
        'c_desc'
    ];
    
    public $timestamps = false;





}
