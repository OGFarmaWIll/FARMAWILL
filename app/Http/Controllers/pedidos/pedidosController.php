<?php

namespace App\Http\Controllers\pedidos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;


class pedidosController extends Controller
{
    public function index()
    {
        return view('pedidos.index');
    }

    public function buscarProductoPedido(Request $request)
    {
        $productos = producto::with(['categoria', 'laboratorio', 'proveedor', 'presentaciones.unidadMedida'])
            ->where('c_nombre', 'LIKE', '%' . $request->input('query') . '%')
            ->get();
        return response()->json($productos);
    }


    

   
}