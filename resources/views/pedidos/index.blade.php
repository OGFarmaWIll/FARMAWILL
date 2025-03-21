@extends('layout.dashboard')

@section('contenido')
    <div class="container-fluid ">

        <div class="row">
            <div class="col-md-12">
                <h4> Pedido al Proveedor</h4>
            </div>
        </div>

        <!-- Primera fila: Tabla de productos -->
        <div class="row">
            <div class="col-md-12">

                <div class="row align-items-center g-2 my-2">
                    <div class="col-md-4">

                        <label for="search" class="fw-bold me-2">Buscar Producto:</label>
                        <input type="text" id="search" class="form-control">

                    </div>
                    <div class="col-md-8 d-flex gap-2 mt-4">
                        <button class="btn btn-warning" onclick="location.reload()">Borrar</button>
                        <button class="btn btn-primary" onclick="window.location.href='/productos/create'">Nuevo</button>
                        <button class="btn btn-danger" id="sinStock">Sin stocks</button>
                        <button class="btn btn-secondary" id="vencidos">Vencidos</button>
                    </div>
                </div>



                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Opciones</th>
                                <th>Cantidad</th>
                                <th></th>
                                <th>Nombre</th>
                                <th>Unidad</th>
                                <th>Laboratorio</th>
                                <th>Proveedor</th>
                                <th>P. Compra</th>
                                <th>Salidas Enero</th>
                                <th>Salidas Febrero</th>
                                <th>Salidas Marzo</th>
                                <th>En Inventario</th>
                            </tr>
                        </thead>


                        <tbody id="body_productoReabastecer">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background: #3C8DBC">
                        <h5 class="mb-0">Lista de Pedidos</h5>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <th>Op.</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Producto</th>
                                <th>Laboratorio</th>
                                <th>Proveedor</th>
                                <th>P. U. Compra</th>
                                <th>P. Total</th>

                            </tr>

                        </thead>
                        <tbody id="Body_pedido">

                        </tbody>
                    </table>

                </div>
            </div>

            <!-- Documento de Venta -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header  text-white" style="background: #3C8DBC">
                        <h5 class="mb-0">Documento de Pedido</h5>
                    </div>
                    <div class="card-body">

                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2  text-end mx-3">
                                <strong>N° de Documento:</strong>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="" class="form-control">
                            </div>
                        </div>

                       
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Proveedor:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="proveedor" class="form-control">

                                </select>
                            </div>
                        </div>


                        <!-- Resumen de Venta -->
                        <div class="d-flex justify-content-center mt-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-center">Resumen de Venta</h6>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Subtotal</span> <span id="subtotalPedido">0.00</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>IGV</span> <span id="igvPedido">0.00</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between bg-light fw-bold">
                                        <span>Total</span> <span id="totalPedido">0.00</span>
                                    </li>
                                </ul>

                                <!-- Botones -->
                                <div class="d-flex justify-content-center mt-3 gap-4 ">
                                    <button class="btn btn-danger" onclick="location.reload()">Cancelar</button>
                                    <button class="btn btn-success" id="FinalizarPedido">Procesar
                                        Pedido</button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>


            @include('pedidos.modal_vencidos')
            @include('pedidos.modal_sinStock')

            
            <script src="{{ asset('js/pedido/pedido.js') }}"></script>
            <script src="{{ asset('js/pedido/default_pedido.js') }}"></script>

        @endsection
