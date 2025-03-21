@extends('layout.dashboard')

@section('contenido')
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header bg-light d-flex align-items-center">
                <i class="fas fa-cash-register me-2"></i>
                <h4 class="mb-0">Historial de Caja</h4>
            </div>

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="fechaInicio" class="form-label"  >Fecha de Inicio:</label>
                        <input type="date" id="fechaInicio" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="fechaFin" class="form-label"  >Fecha de Fin:</label>
                        <input type="date" id="fechaFin" class="form-control">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-success w-100" id="buscarCaja">Buscar</button>
                    </div>
                </div>

                <div id="caja-content">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 10%;">Ver</th>
                                <th style="width: 20%;">Total</th>
                                <th style="width: 35%;">Fecha</th>
                                <th style="width: 35%;">Usuario</th>
                            </tr>
                        </thead>
                        <tbody id="body_caja">
                            <tr>
                              
                               
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <h5><strong>Total:</strong> S/. <span id="totalCaja">0.00</span></h5>
                    <button class="btn btn-primary"  
                    onclick="window.location.href='{{ route('caja.index') }}'">Regresar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/caja/historialCaja.js') }}"></script>
@endsection
