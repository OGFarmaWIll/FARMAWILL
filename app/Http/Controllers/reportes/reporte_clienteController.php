<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\twl_venta;
use App\Models\clientes;

class reporte_clienteController extends Controller
{
    
    public function index()
    {
        $clientes = clientes::all();
        return view('reportes.reporte_cliente', compact('clientes'));
    }


    public function ListarReporteCliente(Request $request)
    {
        $cliente_id = $request->cliente_id;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;


        $query = twl_venta::with(['tipoPago', 'usuario', 'detalleVenta', 'cliente'])
            ->whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin]);

        $totalVentas = twl_venta::whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin])->sum('c_total');

        if ($cliente_id != 0) {
            $query->where('c_idcliente', $cliente_id);
        }

        $ventas = $query->get();

        return response()->json([
            'ventas' => $ventas,
            'totalVentas' => $totalVentas
        ]);
    }



}
