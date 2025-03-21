<?php

namespace App\Http\Controllers\inventario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;


class inventarioController extends Controller
{
    public function index(){
        return view('inventario.index');
    }


    public function listarInventario(){
        $productos = producto::with([
            'laboratorio',
           
        ])->get();

        return response()->json([
            'productos' => $productos,
        ]);

    }



}
