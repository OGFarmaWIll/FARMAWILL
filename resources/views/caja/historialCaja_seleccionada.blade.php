
@extends('layout.dashboard')

@section('contenido')


<div class="container">
    <h2>Corte de Caja # {{$caja->c_ID_Cierre}}</h2>

    @php
        $tiposPago = [
            'Efectivo' => 'Pagos al Contado',
            'Tarjeta' => 'Tarjetas de Crédito o Débito',
            'Yape' => 'Pagos con Yape',
            'Plin' => 'Pagos con Plin',
            'Mixto' => 'Pagos Mixtos',
            'Crédito' => 'Créditos'
        ];

        $ventasPorTipo = [];
        foreach ($tiposPago as $clave => $valor) {
            $ventasPorTipo[$clave] = $caja->ventas->where('tipoPago.c_desc', $clave);
        }
    @endphp

    @foreach($tiposPago as $clave => $titulo)
        <div class="mt-4">
            <table class="table table-bordered">
                <thead class="table-primary text-white">
                    <tr>
                        <th colspan="5">{{ $titulo }}</th>
                    </tr>
                    <tr>
                        <th>Productos</th>
                        <th>Total</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @php $subtotal = 0; @endphp

                    @foreach($ventasPorTipo[$clave] as $venta)
                        <tr>
                            <td>
                                <a class="btn btn-sm btn-primary btn-detalleVenta" 
                                   href="{{ url('datosDetalleVentaCaja/' . $venta->c_idventa) }}">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <span class="ms-2">{{ count($venta->detalleVenta) }} productos</span>
                            </td>
                            
                            
                            <td>S/. {{ $venta->c_total; }}</td>
                            <td>{{ $venta->usuario->c_nombre ?? '' }}</td>
                            <td>{{ $venta->c_fecharegistro }}</td>
                        </tr>
                        
                        @php $subtotal += $venta->c_total; @endphp
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">Sub-Total {{ $titulo }}: S/. {{ number_format($subtotal, 2) }}</td>
                    </tr>
            </table>
        </div>
    @endforeach

    <div class="d-flex align-items-center justify-content-between ">
        <h3 class="mb-0">Total Ventas: S/. {{ number_format($caja->ventas->sum('c_total'), 2) }}</h3>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
    </div>
    

</div>

@endsection
