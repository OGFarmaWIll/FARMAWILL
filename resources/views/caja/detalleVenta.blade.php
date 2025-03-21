@extends('layout.dashboard')

@section('contenido')

<div class="container-fluid mt-4 card py-4 px-2 ">

    <div class="d-flex justify-content-between" >
         <div> <h2 class="mb-4">💲 Resumen de Venta</h2> </div>
        <div> 
            <a href="/ObtenerReporteVenta/{{ $venta->c_idventa }}" target="_blank" class="btn btn-secondary">
                Imprimir
            </a>
        </div>
    </div>

    <p><strong>Cliente :</strong> {{ $venta->cliente->c_nombres }}</p>
    <p><strong>Atendido por :</strong> {{ $venta->usuario->c_nombre }}</p>
    <p><strong>Documento :</strong> B001-{{ str_pad($venta->c_idventa, 6, '0', STR_PAD_LEFT) }}</p>
    <p><strong>Doctor :</strong> {{ $venta->doctor->c_nombres }}</p>
    <p><strong>Tipo de Pago :</strong> {{ $venta->tipoPago->c_desc }}</p>
    
    <table class="table table-bordered mt-3">
        <thead class="table-primary">
            <tr>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Ubicación</th>
                <th>P. U.</th>
                <th>Total</th>
                <th>Comisión</th>
                <th>Descuento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalleVenta as $detalle)
           
                <tr>
                    <td>{{ $detalle->c_cantidad }}</td>
                    <td>{{ $detalle->producto->c_nombre }}</td> 
                    <td>{{ $detalle->producto->c_ubicacion }}</td>
                    <td>S/. {{ number_format($detalle->c_Preciounitario, 2) }}</td>
                    <td>S/. {{ number_format($detalle->c_preciototal, 2) }}</td>
                    <td>S/. 0.00</td> 
                    <td>S/. {{ number_format($detalle->c_Desc, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <div class="text-end">
        <p><strong>Total:</strong> S/. {{ number_format($venta->c_subtotal, 2) }}</p>
        <p><strong>Descuento:</strong> S/. {{ number_format($venta->c_descuento, 2) }}</p>
        <p><strong>Descuento Adicional:</strong> S/. {{ number_format($venta->c_descuentoADI, 2) }}</p>
        <p><strong>Banco 5%:</strong> S/. 0.00</p> 
        <p class="fs-5"><strong>Pagado:</strong> S/. {{ number_format($venta->c_total, 2) }}</p>
    </div>
    
    <div class="text-end " >
        <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>

    </div>
</div>

@endsection
