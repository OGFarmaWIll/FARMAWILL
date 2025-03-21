<?php

namespace App\Http\Controllers\reabastecimiento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;

class reabastecimientoController extends Controller
{
    public function index()
    {
        return view('reabastecimiento.index');
    }


    public function ReabastecimientoStock(Request $request)
    {
        foreach ($request->productos as $productoData) {
            $producto = Producto::find($productoData['idProducto']);
    
            if (!$producto) {
                return response()->json(['error' => 'Producto no encontrado'], 404);
            }
    
            $cantidad = isset($productoData['cantidad']) ? $productoData['cantidad'] : 0;
    
            $producto->c_inventarioini += $cantidad;
    
            $producto->save();
        }
    
        return response()->json([
            'success' => true,
            'mensaje' => 'Stock actualizado correctamente',
        ]);
    }
    


}
