@extends('layout.dashboard')

@section('contenido')

<div class="container-fluid ">
    <div class="card p-3 shadow-sm">
        <h5 class="mb-3">
            <i class="bi bi-person-lines-fill"></i>  Historial de Ventas
        </h5>
        
        <div class="row g-3 align-items-end">
          
            <!-- Fecha de Inicio -->
            <div class="col-md-3">
                <label for="fechaInicio" class="form-label">Fecha de Inicio:</label>
                <input type="date" id="fechaInicio" class="form-control">
            </div>

            <!-- Fecha de Fin -->
            <div class="col-md-3">
                <label for="fechaFin" class="form-label">Fecha de Fin:</label>
                <input type="date" id="fechaFin" class="form-control">
            </div>

            <!-- Botón Buscar -->
            <div class="col-md-2 text-end">
                <button class="btn btn-success w-100 " id="btn_buscar_ventas" >Buscar</button>
            </div>
        </div>

        <div class="table-responsive mt-3 " id="mostrar_reporte_usuario" style="max-height: 500px; overflow-y: auto;">
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
                <tbody id="body_reporte_ventas">

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
</div>

<script src="{{ asset('js/reportes/historial_ventas.js') }}"></script>

@endsection
