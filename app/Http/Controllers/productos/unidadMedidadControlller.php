<?php

namespace App\Http\Controllers\productos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnidadMedida;

class unidadMedidadControlller extends Controller
{
    public function index()
    {
        
        return response()->json( UnidadMedida::all() );
    }


}
