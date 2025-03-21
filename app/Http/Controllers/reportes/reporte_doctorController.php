<?php

namespace App\Http\Controllers\reportes;

use App\Http\Controllers\Controller;
use App\Models\twl_venta;
use Illuminate\Http\Request;
use App\Models\doctores;
class reporte_doctorController extends Controller
{
    public function index()
    {
        $doctores = doctores::all();
        return view('reportes.reporte_doctor', compact('doctores'));
    }

    public function ListarReporteDoctor(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;


        $query = twl_venta::with(['tipoPago', 'usuario', 'detalleVenta', 'doctor'])
            ->whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin]);

        $totalVentas = twl_venta::whereBetween('c_fecharegistro', [$fecha_inicio, $fecha_fin])->sum('c_total');

        if ($doctor_id != 0) {
            $query->where('c_iddoctor', $doctor_id);
        }

        $ventas = $query->get();

        return response()->json([
            'ventas' => $ventas,
            'totalVentas' => $totalVentas
        ]);
    }
}
