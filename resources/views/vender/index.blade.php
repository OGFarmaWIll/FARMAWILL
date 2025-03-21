@extends('layout.dashboard')

@section('contenido')
    <div class="container-fluid py-4">
        <!-- Primera fila: Tabla de productos -->
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="search" class="form-label fw-bold">Buscar Producto</label>
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" placeholder="Buscar por nombre...">
                        <button class="btn btn-outline-secondary" type="button">Vaciar</button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Cantidad Unidad</th>
                                <th>Nombre</th>
                                <th>P. U.</th>
                                <th>Similar</th>
                                <th>C</th>
                                <th>Categoría</th>
                                <th>Laboratorio</th>
                                <th>P. Activo</th>
                                <th>Presentación</th>
                                <th>Stock</th>
                                <th>Vencimiento</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody id="body_productoVender">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background: #3C8DBC" >
                        <h5 class="mb-0">Lista de Venta</h5>
                    </div>

                    <table class="table table-bordered"  >
                        <thead>
                            <tr class="table-primary">
                                <th>Op.</th>
                                <th>C.</th>
                                <th>Unidad</th>
                                <th>Producto</th>
                                <th>P. U.</th>
                                <th>P. T.</th>
                                <th>Desct.</th>
                                <th>Ubicación</th>
                            </tr>
                        </thead>
                        <tbody id="listaVentaBody">

                        </tbody>
                    </table>

                </div>
            </div>

            <!-- Documento de Venta -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header  text-white"  style="background: #3C8DBC">
                        <h5 class="mb-0">Documento de Venta</h5>
                    </div>
                    <div class="card-body">

                        <!-- Cliente -->
                        <div class="d-flex justify-content-center">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Cliente:</strong>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex">
                                    <select id="clienteVender" class="form-control">

                                    </select>
                                    <button class="btn btn-primary" id="btn_cliente">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Doctor -->
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Doctor:</strong>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex">
                                    <select id="doctorVender" class="form-control">

                                    </select>
                                    <button class="btn btn-primary" id="btn_doctor">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Tipo Documento -->
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Tipo Documento:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="tipo_documento" class="form-control">
                                    {{-- <option value="1">Nota de venta</option>
                                    <option value="2">Factura</option>
                                    <option value="3">Boleta</option> --}}
                                </select>
                            </div>
                        </div>

                        <!-- Descuento Adicional -->
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2  text-end mx-3">
                                <strong>Descuento Adicional:</strong>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="descuentoAdicional" class="form-control" value="0">
                            </div>
                        </div>

                        <!-- Pago -->
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Pago:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="formaPago" class="form-control">
                                    {{-- <option value="0">-- SELECCIONAR --</option>
                                    <option value="1">Efectivo</option>
                                    <option value="2">Crédito</option>
                                    <option value="3">Tarjeta</option>
                                    <option value="4">Yape</option>
                                    <option value="5">Plin</option>
                                    <option value="6">Mixto</option> --}}
                                </select>
                            </div>
                        </div>

                        <!-- Efectivo -->
                        <div class="d-flex justify-content-center mt-2 pago-efectivo d-none">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Monto:</strong>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="monto" class="form-control" value="0">
                            </div>
                        </div>

                        <!-- Tarjeta -->
                        <div class="d-flex justify-content-center mt-2 pago-tarjeta d-none">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Tipo Tarjeta:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="tipoTarjeta" class="form-control">
                                    <option value="1">VISA - DEBITO</option>
                                    <option value="2">VISA - CREDITO</option>
                                    <option value="3">MASTERCARD - DEBITO</option>
                                    <option value="4">MASTERCARD - CREDITO</option>
                                </select>
                            </div>
                        </div>

                        <!-- Mixto -->
                        <div class="d-flex justify-content-center mt-2 pago-mixto d-none">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Detalle:</strong>
                            </div>
                            <div class="col-md-4">
                                <textarea type="text" id="detalleMixto" class="form-control"></textarea>
                            </div>
                        </div>



                        <!-- Resumen de Venta -->
                        <div class="d-flex justify-content-center mt-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-center">Resumen de Venta</h6>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Subtotal</span> <span id="subtotalVenta">0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Descuento</span> <span id="descuentoVenta">0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>IGV</span> <span id="igvVenta">0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Banco 5%</span> <span id="bancoVenta">0.00</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between bg-light fw-bold">
                                        <span>Total</span> <span id="totalVenta">0.00</span>
                                    </li>
                                </ul>

                                <!-- Botones -->
                                <div class="d-flex justify-content-center mt-3 gap-4 ">
                                    <button class="btn btn-danger" onclick="location.reload()">Cancelar</button>
                                    <button class="btn btn-success" id="FinalizarVenta" >Finalizar Venta</button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>

       


            @include('doctor.modalDoctor')
            @include('cliente.modalCliente')

            <script src="{{ asset('js/vender/defaultVender.js') }}"></script>
            <script src="{{ asset('js/vender/vender.js') }}"></script>
            <script src="{{ asset('js/vender/venderCrear.js') }}"></script>

        @endsection
