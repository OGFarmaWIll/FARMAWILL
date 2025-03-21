<?php

namespace App\Http\Controllers\vender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\twl_venta;
use App\Models\twl_ventadet;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\tipoDocumento;
use App\Models\tipoPago;
use Illuminate\Support\Facades\Auth;
use App\Models\twl_cierrecaja;

class venderController extends Controller
{
    public function index(){
        return view('vender.index');
    }

    public function buscarProducto(Request $request)
    {
        $productos = producto::with(['categoria', 'laboratorio', 'proveedor', 'presentaciones.unidadMedida'])
            ->where('c_nombre', 'LIKE', '%' . $request->input('query') . '%')
            ->get();
        return response()->json($productos);
    }
    
    public function listarTipoDocumento(){
        $tipoDocumento = tipoDocumento::all();
        return response()->json($tipoDocumento);
    }

    public function listarTipoPago(){
        $formaPago = tipoPago::all();
        return response()->json($formaPago);
    }


    public function store(Request $request){
        $productos = json_decode($request->input('productos'), true);

        $request->validate([
            'doctorVender' => 'required',
            'clienteVender' => 'required',
            'tipo_documentoVender' => 'required',
            'tipoPago' => 'required',
        ]);


        $idCaja = twl_cierrecaja::latest('c_ID_Cierre')->first();

        if (!$idCaja || !is_null($idCaja->c_fechacierre)) {
            $nuevaCaja = twl_cierrecaja::create([
                'c_fechacierre' => null,
                'c_idusuariocierre' => null,
                'c_Total_Final' => 0,
                'c_Comentarios' => 'apertura caja'
            ]);
            $idCaja = $nuevaCaja;
        }

        $nuevoId = $idCaja->c_ID_Cierre; 
        
        $twl_venta = twl_venta::create([
            'c_iddoctor' => $request->doctorVender,
            'c_idcliente' => $request->clienteVender,
            'c_tipodoc' => $request->tipo_documentoVender,
            'c_descuentoADI' => $request->descuentoAdicional,
            'c_tipopago' => $request->tipoPago,
            'c_subtotal' => $request->subTotal,
            'c_descuento' => $request->descuentoVenta,
            'c_igv' => $request->igvVenta,
            'c_total' => $request->totalVenta,
            'c_idusuario' => Auth::user()->c_idusuario,
            'c_fecharegistro' => Carbon::now(),
            'c_ID_Cierre' => $nuevoId,
            'c_detalle' => $request->detalleMixto
        ]);

         $ventaID = $twl_venta->c_idventa;

        foreach ($productos as $producto) {
            twl_ventadet::create([
                'c_idventa' => $ventaID,
                'c_cantidad' => $producto['c_cantidad'],
                'c_idunidadmedida' => $producto['idUnidad'],
                'c_ididproducto' => $producto['c_ididproducto'],
                'c_Preciounitario' => $producto['c_Preciounitario'],
                'c_preciototal' => $producto['c_preciototal'],
                'c_Desc' => $producto['c_Desc']
            ]);

            $productoModel = producto::find($producto['c_ididproducto']);

            if ($productoModel) {

                $nuevoStock = max(0, $productoModel->c_inventarioini - $producto['c_cantidad']);
                $productoModel->c_inventarioini = $nuevoStock;
                $productoModel->save();
            }
            

        }

        $idCaja = twl_cierrecaja::latest('c_ID_Cierre')->first();

        if ($idCaja) {
            $idCaja->increment('c_Total_Final', $request->totalVenta);
        }

        return response()->json([
            'status' => 'success',
            'mensaje' => 'Venta creado exitosamente']
            , 201);

    }

    public function ReporteVenta(Request $request){
        
     $venta = twl_venta::with('tipoPago')->orderBy('c_idventa', 'desc')->first();

       $detalleVenta = twl_ventadet::where('c_idventa', $venta->c_idventa)
                ->with('producto') 
                ->get();


        $pdf = Pdf::loadView('PDF.reporte_venta', compact('venta', 'detalleVenta'));
    
        return $pdf->stream();
    }
    
    public function ObtenerReporteVenta($id){

        $venta = twl_venta::with('tipoPago')->where('c_idventa', $id)->first();
        
          $detalleVenta = twl_ventadet::where('c_idventa', $id)
                   ->with('producto') 
                   ->get();
   
           $pdf = Pdf::loadView('PDF.reporte_venta', compact('venta', 'detalleVenta'));
       
           return $pdf->stream();
       }
       
}
