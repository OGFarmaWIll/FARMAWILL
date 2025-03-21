<?php

namespace App\Http\Controllers\caja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\twl_cierrecaja;
use Illuminate\Support\Facades\Auth;
use App\Models\twl_venta;

class cajaController extends Controller
{
    public function index()
    {
        return view('caja.index');
    }

    public function historialCaja(){
        return view('caja.historialCaja');
    }

    public function ListarHistorialCaja()
    {
        $cajas = twl_cierrecaja::with(['usuario'])
            ->whereNotNull('c_fechacierre') 
            ->get(); 
    
        $total_caja = twl_cierrecaja::whereNotNull('c_fechacierre')->sum('c_Total_Final');

        return response()->json([
            'cajas' => $cajas,
            'total_caja' => $total_caja
        ]);
    }

    public function ListarHistorialCajaPorFechas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
    
        $cajas = twl_cierrecaja::with(['usuario'])
            ->whereNotNull('c_fechacierre')
            ->whereBetween('c_fechacierre', [$fechaInicio, $fechaFin])
            ->get();
    
        $total_caja = twl_cierrecaja::whereNotNull('c_fechacierre')
            ->whereBetween('c_fechacierre', [$fechaInicio, $fechaFin])
            ->sum('c_Total_Final');
    
        return response()->json([
            'cajas' => $cajas,
            'total_caja' => $total_caja
        ]);
    }
    

    public function listarCierrecajaSeleccionada($idcierre){

        $caja = twl_cierrecaja::with(['ventas.tipoPago','ventas.usuario','ventas.detalleVenta'])
        ->where('c_ID_Cierre', $idcierre)
        ->first(); 

       return view('caja.historialCaja_seleccionada', compact('caja'));

 
    }

    
    public function listarCaja()
    {
        $caja = twl_cierrecaja::with(['ventas.tipoPago','ventas.usuario','ventas.detalleVenta'])
        ->whereNull('c_fechacierre') 
        ->latest('c_ID_Cierre') 
        ->first(); 
    
    
        return response()->json($caja);
    }


    public function cerrarCaja()
    {
        $ultimaCaja = twl_cierrecaja::orderBy('c_ID_Cierre', 'desc')->first();

        if($ultimaCaja->c_fechacierre){
            return response()->json(['error' => 'La caja ya está cerrada']);
        }
        $ultimaCaja->c_fechacierre = now();
        $ultimaCaja->c_idusuariocierre = Auth::user()->c_idusuario;
        $ultimaCaja->save();
        return response()->json(['success' => 'La caja se ha cerrado correctamente']);
    
     
    }
    

    public function datosDetalleVentaCaja($idVenta){
        $venta = twl_venta::with(['tipoPago','usuario','detalleVenta.producto','cliente','doctor'])
        ->where('c_idventa', $idVenta)
        ->first();

       return view('caja.detalleVenta', compact('venta'));
    }



  
    
}
