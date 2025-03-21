@extends('layout.dashboard')

@section('contenido')

<div class="container-fluid ">
    <div class="card p-3 shadow-sm">
        <h5 class="mb-3">
            <i class="bi bi-person-lines-fill"></i> Reportes de Ventas x Usuario
        </h5>
        
        <div class="row g-3 align-items-end">
            <!-- Usuario -->
            <div class="col-md-4">
                <label for="usuario" class="form-label">Usuario:</label>
                <select id="usuario_select" class="form-select">
                    <option selected value="0">Todos</option>
                  @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->c_idusuario }}">{{ $usuario->c_nombre }}</option>
                  @endforeach
                </select>
            </div>

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
                <button class="btn btn-success w-100 " id="btn_buscar_usuario" >Buscar</button>
            </div>
        </div>

        <div class="table-responsive mt-3 d-none" id="mostrar_reporte_usuario" style="max-height: 500px; overflow-y: auto;">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Ver</th>
                        <th>Usuario</th>
                        <th>Productos</th>
                        <th>Subtotal</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th>Pago</th>
                    </tr>
                </thead>
                <tbody id="body_reporte_usuario">

                </tbody>
            </table>
        </div>
                
        <div class="mt-3">
            <h5>Total de Ventas: S/. <span class="" id="total_ventas_usuario"></span></h5>
        </div>

    </div>
</div>

<script src="{{ asset('js/reportes/reporte_usuario.js') }}"></script>

@endsection
