@extends('layout.dashboard')

@section('contenido')
    <div class="container">
        <!-- ENCABEZADO -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary m-0">📦 Directorio de Proveedores</h2>
        </div>

        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                    <input type="text" id="search" class="form-control" placeholder="Buscar por nombre...">
                </div>
            </div>
            <div class="col-md-auto">
                <button class="btn btn-primary d-flex align-items-center px-4" data-bs-toggle="modal" data-bs-target="#modalProveedor">
                    <i class="bi bi-plus-circle me-2"></i> Nuevo Proveedor
                </button>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover table-striped" id="tablaProveedores">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>RUC</th>
                        <th>Nombre o Razon Social</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="body_proveedor" class="text-center">
                </tbody>
            </table>
        </div>
    </div>

    @include('proveedores.modalProveedor')

    <script src="{{ asset('js/proveedores/proveedor.js') }}"></script>
@endsection
