@extends('layout.dashboard')

@section('contenido')

<div class="container-fluid ">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4><i class="bi bi-cart"></i> Lista de Ventas</h4>
        <a href="{{ route('vistaReporteVenta') }}" class="btn btn-outline-secondary"><i class="bi bi-clock-history"></i> Historial</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Opciones</th>
                    <th>Número Documento</th>
                    <th>DNI/RUC Cliente</th>
                    <th>Producto(s)</th>
                    <th>Total</th>
                    <th>Tipo</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Ganancia</th>
                    <th>Comisión</th>
                    <th>Descuento</th>
                </tr>
            </thead>
            <tbody id="body_reporte_venta" style="max-height: 500px; overflow-y: auto;">
                
            </tbody>
        </table>
    </div>

    <div class="d-flex  gap-3 bg-white text-gray-800 font-bold text-xl p-3">
        <h5><strong>Total Ventas:</strong> <span id="totalVentas">0.00</span></h5> |
        <h5><strong>Total Ganancia:</strong> <span id="totalGanancia">0.00</span></h5> |
        <h5><strong>Total Comisión:</strong> <span id="totalComision">0.00</span></h5> |
        <h5><strong>Total Descuentos:</strong> <span id="totalDescuentos">0.00</span></h5>
    </div>
    
  
</div>

<script src="{{ asset('js/reportes/reporte_venta.js') }}"></script>

@endsection
