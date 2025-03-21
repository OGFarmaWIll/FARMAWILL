<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\twl_venta;
use Carbon\Carbon;

class reporte_ventaController extends Controller
{
    public function index()
    {
        return view('reportes.reporte_venta');
    }

    public function vistaReporteVenta(){
        return view('reportes.historial_ventas');
    }


    public function ListarReporteVenta(){
        $hoy = Carbon::today(); 
    
        $ventas = twl_venta::with(['tipoPago','usuario','detalleVenta','cliente'])
                    ->whereDate('c_fecharegistro', $hoy) 
                    ->get();
                    
        $totalVentasHoy = twl_venta::whereDate('c_fecharegistro', $hoy)->sum('c_total');

        return response()->json([
            'ventas' => $ventas,
            'totalVentasHoy' => $totalVentasHoy
        ]);
    }


    
    public function ListarReporteVentaFechas(Request $request)
    {
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
    
        $query = twl_venta::with(['tipoPago', 'usuario', 'detalleVenta', 'cliente']);
    
     
        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin]);
        }
    
        $ventas = $query->get();
        $totalVentas = $query->sum('c_total'); 
    
        return response()->json([
            'ventas' => $ventas,
            'totalVentas' => $totalVentas
        ]);
    }
    
    




}


