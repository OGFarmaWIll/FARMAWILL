@extends('layout.dashboard')

@section('contenido')
    <div class="container-fluid ">

        <div class="row">
            <div class="col-md-12">
                <h4>  Guía de Remisión </h4>
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
                                <th>Lote</th>
                                <th>R. S.</th>
                                <th>F. V.</th>
                                <th>P. U.</th>
                                <th>Stock</th>
                            </tr>
                        </thead>


                        <tbody id="body_productoGuiaRemision">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background: #3C8DBC">
                        <h5 class="mb-0">Lista de Guía</h5>
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
                        <tbody id="body_guiaRemision">

                        </tbody>
                    </table>

                </div>
            </div>

            <!-- Documento de Venta -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header  text-white" style="background: #3C8DBC">
                        <h5 class="mb-0">Documento de Guía</h5>
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
                                <strong>Tipo:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="tipo_select" class="form-control">
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Ingreso</option>
                                    <option value="2">Salida</option>
                                </select>
                            </div>
                        </div>

                        <!-- si es ingreso -->
                        
                        <div class="d-flex justify-content-center mt-2 d-none " id="origen">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Origen:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="origen_select" class="form-control">
                                    <option value="1">ALMACEN</option>
                                    <option value="6">DADO DE BAJA</option>
                                    <option value="5">DEVOLUCION PROVEEDOR</option>
                                    <option value="2">SUCURSAL 01</option>
                                    <option value="3">SUCURSAL 02</option>
                                    <option value="4">SUCURSAL 03</option>
                                </select>
                            </div>
                        </div>

                        <!-- si es salida -->
                        <div class="d-flex justify-content-center mt-2 d-none " id="destino">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Destino:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="destino_select" class="form-control">
                                    <option value="1">ALMACEN</option>
                                    <option value="6">DADO DE BAJA</option>
                                    <option value="5">DEVOLUCION PROVEEDOR</option>
                                    <option value="2">SUCURSAL 01</option>
                                    <option value="3">SUCURSAL 02</option>
                                    <option value="4">SUCURSAL 03</option>
                                </select>
                            </div>
                        </div>





                        <!-- Resumen de Venta -->
                        <div class="d-flex justify-content-center mt-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-center">Resumen de Venta</h6>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Subtotal</span> <span id="subtotalGuiaRemision">0.00</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>IGV</span> <span id="igvGuiaRemision">0.00</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between bg-light fw-bold">
                                        <span>Total</span> <span id="totalGuiaRemision">0.00</span>
                                    </li>
                                </ul>

                                <!-- Botones -->
                                <div class="d-flex justify-content-center mt-3 gap-4 ">
                                    <button class="btn btn-danger" onclick="location.reload()">Cancelar</button>
                                    <button class="btn btn-success" id="FinalizarGuiaRemision">Procesar
                                        Guía </button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>


            @include('pedidos.modal_vencidos')
            @include('pedidos.modal_sinStock')

            
            <script src="{{ asset('js/pedido/default_pedido.js') }}"></script>
            <script src="{{ asset('js/guia_remision/guia_remision.js') }}"></script>


        @endsection
