@extends('layout.dashboard')

@section('contenido')
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header ">

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4><i class="bi bi-wallet2"></i> Caja</h4>
                    </div>

                    <div>
                        <a href="{{ route('historialCaja') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-clock-history"></i> Historial
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body d-none" id="caja_conventas" >
                <!-- Pestañas -->
                <ul class="nav nav-tabs" id="paymentTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-id="2" href="#">Crédito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-id="1" href="#">Contado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-id="3" href="#">Tarjeta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-id="4" href="#">Yape</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-id="5" href="#">Plin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-id="6" href="#">Mixto</a>
                    </li>
                </ul>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>Ver</th>
                                <th>Productos</th>
                                <th>Total</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>


                <div class="d-flex justify-content-between">
                    <h6><strong>Sub-Total:</strong> <span class="sub-total">S/. 0.00</span></h6>
                </div>

            </div>


          <div class="card-body" id="caja_sinventas" >
                <div class="container-fluid mt-4">
                        No hay ventas
                        <h5>No se ha realizado ninguna venta. <h5>
                    </div>  
            </div>


            <div class="card-footer d-none " id="caja_footer" >
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><strong>Total Ventas:</strong> <span class="total-ventas">0.00</span></h5>

                    </div>
                    <div>
                        <button class="btn btn-danger" id="cerrarCaja" >
                            <i class="bi bi-box-arrow-right"></i> Cerrar Caja
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

 

    <script src="{{ asset('js/caja/caja.js') }}"></script>

@endsection
