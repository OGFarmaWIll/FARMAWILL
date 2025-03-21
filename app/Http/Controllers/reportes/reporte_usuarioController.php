<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\twl_venta;

class reporte_usuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = Usuario::all();
        return view('reportes.reporte_usuario', compact('usuarios'));
    }

    public function ListarReporteUsuario(Request $request)
    {
        $usuario_id = $request->usuario_id;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;


        $query = twl_venta::with(['tipoPago', 'usuario', 'detalleVenta'])
            ->whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin]);

        $totalVentas = twl_venta::whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin])->sum('c_total');

        if ($usuario_id != 0) {
            $query->where('c_idusuario', $usuario_id);
        }

        $ventas = $query->get();

        return response()->json([
            'ventas' => $ventas,
            'totalVentas' => $totalVentas
        ]);
    }
}




