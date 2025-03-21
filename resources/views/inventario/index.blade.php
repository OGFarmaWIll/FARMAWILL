

@extends('layout.dashboard')

@section('contenido')


<div class="container-fluid mt-4">
        <h3 class="mb-3"><i class="bi bi-bar-chart"></i> Inventario de Productos</h3>

        <div class="table-responsive">
            <table class="table table-bordered text-center" id="tabla_inventario">
                <thead class="table-primary">
                    <tr>
                        <th>N°</th>
                        <th>Descripción</th>
                        <th>Laboratorio</th>
                        <th>Lote</th>
                        <th>F. V.</th>
                        <th>Entradas</th>
                        <th>Salidas</th>
                        <th>Stock</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                   <tbody id="tbody_inventario">

                   </tbody>
            </table>
        </div>

      
        
        <div class="text-end fw-bold">
            Total Invertido: S/. 0.00
        </div>
    </div>



        <script src="{{ asset('js/inventario/inventario.js') }}"></script>



@endsection







