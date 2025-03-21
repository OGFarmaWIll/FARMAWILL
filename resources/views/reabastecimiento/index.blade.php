@extends('layout.dashboard')

@section('contenido')
    <div class="container-fluid py-4">
        <!-- Primera fila: Tabla de productos -->
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="search" class="form-label fw-bold">Buscar Producto</label>
                    <div class="input-group">
                        <input type="text" id="search" class="form-control">
                        <button class="btn btn-outline-secondary" type="button">Vaciar</button>
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
                                <th>R.S</th>
                                <th>F.V</th>
                                <th>P.U</th>
                                <th>Stock</th>
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
                    <div class="card-header text-white" style="background: #3C8DBC" >
                        <h5 class="mb-0">Lista de Reabastecimiento</h5>
                    </div>

                    <table class="table table-bordered"  >
                        <thead>
                            <tr class="table-primary">
                                <th></th>
                                <th>C.</th>
                                <th>Unidad</th>
                                <th>Producto</th>
                                <th>Laboratorio</th>
                                <th>Proveedor</th>
                                <th>Lote</th>
                                <th>R. S.</th>
                                <th>F. V.</th>
                                <th>P. Unitario</th>
                                <th>P. Total</th>

                            </tr>
                        </thead>
                        <tbody id="Body_reabastecimiento">

                        </tbody>
                    </table>

                </div>
            </div>

            <!-- Documento de Venta -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header  text-white"  style="background: #3C8DBC">
                        <h5 class="mb-0">Documento de Compra</h5>
                    </div>
                    <div class="card-body">
                        
                         <!-- Descuento Adicional -->
                         <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2  text-end mx-3">
                                <strong>N° de Documento:</strong>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="" class="form-control" >
                            </div>
                        </div>

                        <!-- Tipo Documento -->
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Proveedor:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="proveedor" class="form-control">
                                   
                                </select>
                            </div>
                        </div>

                       

                        <!-- Pago -->
                        <div class="d-flex justify-content-center mt-2">
                            <div class="col-md-2 text-end mx-3">
                                <strong>Pago:</strong>
                            </div>
                            <div class="col-md-4">
                                <select id="" class="form-control">
                                    <option value="1">Efectivo</option>
                                    <option value="2">Credito</option>
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

                      


                        <!-- Resumen de Venta -->
                        <div class="d-flex justify-content-center mt-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold text-center">Resumen de Venta</h6>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Subtotal</span> <span id="subtotalReabastecimiento">0.00</span>
                                    </li>
                                   
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>IGV</span> <span id="igvReabastecimiento">0.00</span>
                                    </li>
                                    
                                    <li class="list-group-item d-flex justify-content-between bg-light fw-bold">
                                        <span>Total</span> <span id="totalReabastecimiento">0.00</span>
                                    </li>
                                </ul>

                                <!-- Botones -->
                                <div class="d-flex justify-content-center mt-3 gap-4 ">
                                    <button class="btn btn-danger" onclick="location.reload()">Cancelar</button>
                                    <button class="btn btn-success" id="FinalizarReabastecimiento">Procesar Reabastecimiento</button>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>

       

    <script src="{{ asset('js/reabastecimiento/reabastecimiento.js') }}"></script>
           
        @endsection
