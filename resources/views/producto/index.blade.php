@extends('layout.dashboard')

@section('contenido')

    <style>
        .activado{
            background:blue;
        }

        .desactivado{
            background:grey;
        }

    </style>

    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary m-0">📦 Lista de Productos</h2>
            <a  href="{{ route('productos.create') }}" class="btn btn-primary d-flex align-items-center px-4" >
                <i class="bi bi-plus-circle me-2"></i> Nuevo Producto
            </a>
        </div>

        <div class="row mb-3 d-flex justify-content-between align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                    <input type="text" id="search" class="form-control" placeholder="Buscar por nombre...">
                </div>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover " id="tablaProducto" >
                <thead class="table-primary text-center">
                    <tr>
                        <th>Opciones</th>
                        <th>Nombre</th>
                        <th>Presentación</th>
                        <th>Unidad</th>
                        <th>Categoría</th>
                        <th>Laboratorio</th>
                        <th>Proveedor</th>
                        <th>P. Compra</th>
                        <th>P. Venta</th>
                        <th>% G.</th>
                        <th>Lote</th>
                        <th>Vencimiento</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody id="body_proveedor" class="text-center">
                  
                </tbody>
            </table>
        </div>

        <div class="row mt-4 text-center">
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <h4 class="text-primary" id="totalProductos" > 1384</h4>
                    <p>Productos</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <h4 class="text-warning" id="producto_porVencer" > 9</h4>
                    <p>Por Vencer</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <h4 class="text-danger" id="producto_vencidos" >34</h4>
                    <p>Vencidos</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm p-3">
                    <h4 class="text-warning" id="producto_pocoStock" > 277</h4>
                    <p>Con Poco Stock</p>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('js/producto/productos.js') }}"></script>

@endsection
