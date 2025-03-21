@extends('layout.dashboard')

@section('contenido')


<style>
    .table-container {
        max-height: 300px; /* Altura máxima para el scroll */
        overflow-y: auto;  /* Scroll vertical */
    }
</style>

        <div class="container-fluid mt-4">

        <div>
            <h4>Resumen</h4>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="small-box bg-info text-white">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Productos</p>
                    </div>
                    <i class="fa fa-glass-martini position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-white text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="small-box" style="background-color: #605ca8; color: white;">
                    <div class="inner">
                        <h3>10</h3>
                        <p>Clientes</p>
                    </div>
                    <i class="fa fa-user position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-white text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="small-box" style="background-color: #d2d6de; color: black;">
                    <div class="inner">
                        <h3>3</h3>
                        <p>Doctores</p>
                    </div>
                    <i class="fa fa-briefcase position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-black text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="small-box bg-warning text-white">
                    <div class="inner">
                        <h3>21</h3>
                        <p>Proveedores</p>
                    </div>
                    <i class="fa fa-truck position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-white text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <div class="small-box" style="background-color: #dd4b39; color: white;">
                    <div class="inner">
                        <h3>152</h3>
                        <p>Categorías</p>
                    </div>
                    <i class="fa fa-th-large position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-white text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="small-box" style="background-color: #00a65a; color: white;">
                    <div class="inner">
                        <h3>172</h3>
                        <p>Laboratorios</p>
                    </div>
                    <i class="fa fa-flask position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-white text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="small-box" style="background-color: #0073b7; color: white;">
                    <div class="inner">
                        <h3>S/. 145.50</h3>
                        <p>Venta de Productos</p>
                    </div>
                    <i class="fa fa-dollar-sign position-absolute"
                        style="opacity: 0.2; font-size: 80px; right: 10px; top: 10px;"></i>
                    <a href="#" class="d-block text-white text-center p-2"
                        style="background-color: rgba(0,0,0,0.1); text-decoration: none;">
                        Ver más ➜
                    </a>
                </div>
            </div>
        </div>
        


        <h4>Fecha Vencimiento:</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Vencimiento</th>
                                <th>Aviso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-danger text-white">
                                <td>1551</td>
                                <td>PASTA DENTAL COLGATE TOTAL ENCIAS REFORZADAS 75ML</td>
                                <td>2025-03-01</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>3084</td>
                                <td>BYE GRIP NOCHE</td>
                                <td>2024-10-31</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>3085</td>
                                <td>BYE GRIP DÍA</td>
                                <td>2024-10-31</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>3075</td>
                                <td>GRIPA C JUNIOR TABLETA MASTIC</td>
                                <td>2024-11-01</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>138</td>
                                <td>PARAMIDOL MIGRAÑA TABLETA</td>
                                <td>2024-11-01</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>3059</td>
                                <td>NEOMYCOL 20 g</td>
                                <td>2024-11-01</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>3059</td>
                                <td>NEOMYCOL 20 g</td>
                                <td>2024-11-01</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                            <tr>
                                <td>3059</td>
                                <td>NEOMYCOL 20 g</td>
                                <td>2024-11-01</td>
                                <td><span class="badge bg-primary">Para Dar de Baja.</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h5 class="fw-bold">TOTAL: <span id="total">48</span></h5>
                    <button class="btn btn-primary">Venta de Productos</button>
                </div>


            </div>

            <div class="col-md-6">
                <h6>Gráfica de Fechas de Vencimiento</h6>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <canvas id="miGrafico"></canvas>
                    </div>
                </div>

            </div>

        </div>


        <h4 class="fw-bold">Stocks Mínimos:</h4>

        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>Aviso</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="sin-stock">
                                <td>3100</td>
                                <td>CURITAS BEND-C</td>
                                <td>0</td>
                                <td><span class="badge bg-danger">No hay existencias.</span></td>
                            </tr>
                            <tr class="sin-stock">
                                <td>454</td>
                                <td>CURITAS CURE BAND</td>
                                <td>0</td>
                                <td><span class="badge bg-danger">No hay existencias.</span></td>
                            </tr>
                            <tr class="sin-stock">
                                <td>471</td>
                                <td>ESMALTE VOGUE</td>
                                <td>0</td>
                                <td><span class="badge bg-danger">No hay existencias.</span></td>
                            </tr>
                            <tr>
                                <td>368</td>
                                <td>TALCO HANSA FOOT EXPERT 300 GR</td>
                                <td>10</td>
                                <td><span class="badge bg-warning text-dark">Poco stock.</span></td>
                            </tr>
                            <tr>
                                <td>926</td>
                                <td>ACEITE DE ALMENDRAS</td>
                                <td>5</td>
                                <td><span class="badge bg-warning text-dark">Muy poco stock.</span></td>
                            </tr>
                            <tr>
                                <td>926</td>
                                <td>ACEITE DE ALMENDRAS</td>
                                <td>5</td>
                                <td><span class="badge bg-warning text-dark">Muy poco stock.</span></td>
                            </tr>
                            <tr>
                                <td>926</td>
                                <td>ACEITE DE ALMENDRAS</td>
                                <td>5</td>
                                <td><span class="badge bg-warning text-dark">Muy poco stock.</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
               
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h5 class="fw-bold">TOTAL: <span id="total">278</span></h5>
                    <button class="btn btn-primary">Reabastecer Inventario</button>
                </div>
            </div>
    
            
            <div class="col-md-6">
                <h6 class="">Gráfica de Stocks Mínimos</h6>
                <div class="row justify-content-center">
                <div class="col-md-6">
                    <canvas id="stockChart" width="200" height="200"></canvas>
                </div>
            </div>

            </div>
        </div>

        <h4 class="fw-bold">Ranking Productos:</h4>

        <div class="row">
            <!-- Tabla de Productos -->
            <div class="col-md-6">
                <div class="table-responsive table-container">
                    <table class="table table-bordered table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>CÓDIGO</th>
                                <th>NOMBRE</th>
                                <th>VENTAS FEBRERO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3031</td>
                                <td>IBUPROFENO 800MG TABLETA</td>
                                <td>54</td>
                            </tr>
                            <tr>
                                <td>2825</td>
                                <td>TERBOMOX 500MG TABLETA</td>
                                <td>13</td>
                            </tr>
                            <tr>
                                <td>1819</td>
                                <td>OTOZAMBON GOTAS OTICAS</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>48</td>
                                <td>DICLOFENACO 50MG TABLETA DE LR</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>2025</td>
                                <td>ETOXBLAM 90MG TABLETA</td>
                                <td>11</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <h5 class="fw-bold">TOTAL: <span id="total">10</span></h5>
                    <button class="btn btn-primary">Venta de Productos</button>
                </div>
            </div>

            <!-- Gráfico de Ventas -->
            <div class="col-md-6">
                <h6 class="">Gráfica de Ventas</h6>
                <div class="row justify-content-center" style="height: 300px;">
                    
                        <canvas id="salesChart"></canvas>
                    

            </div>
        </div>

        <h4 class="fw-bold">Ventas Año 2025:</h4>

        <div class="row">
           
            <div class="col-md-12 mt-3">
                <div class="row justify-content-center" >
                    <div class="col-md-12" style="height: 600px;" >
                     <canvas id="ventasAnuales"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script>
        $(document).ready(function() {
            var ctx = $("#miGrafico"); // Obtener el canvas
            var miGrafico = new Chart(ctx, {
                type: 'pie', // Tipo de gráfico
                data: {
                    labels: [
                        "Vencidos = 36",
                        "Muy poco tiempo = 9",
                        "Poco Tiempo = 3",
                        "En Buen Estado = 1341"
                    ],
                    datasets: [{
                        data: [36, 9, 3, 1341], // Valores
                        backgroundColor: [
                            'blue', // Vencidos
                            'red', // Muy poco tiempo
                            'orange', // Poco Tiempo
                            'green' // En Buen Estado
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });


            var ctx = $('#stockChart')[0].getContext('2d');
        
            var stockChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Con Stock', 'Sin Stock', 'Muy Poco Stock', 'Poco Stock'],
                    datasets: [{
                        data: [1111, 259, 9, 10],
                        backgroundColor: ['blue', 'red', 'orange', 'green']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });



            var ctx = $('#salesChart')[0].getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['3031', '2825', '1819', '48', '2025', '1404', '1969', '57', '2822', '2784'],
                    datasets: [{
                        label: 'Ventas último mes',
                        data: [54, 13, 12, 12, 11, 10, 9, 8, 7, 6],
                        backgroundColor: 'rgba(54, 162, 235, 0.3)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // 🔥 Esto convierte el gráfico en horizontal
                    responsive: true,
                    maintainAspectRatio: false,
                   
                }
            });
            



            var ctx = document.getElementById('ventasAnuales').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    datasets: [
                        {
                            label: 'Ventas',
                            data: [1300, 1320, 20, 15, 10, 8, 7, 6, 5, 4, 3, 2],
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Ganancias',
                            data: [350, 280, 5, 4, 3, 2, 2, 1, 1, 1, 1, 1],
                            backgroundColor: 'rgba(255, 159, 64, 0.5)',
                            borderColor: 'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Comisiones',
                            data: [20, 15, 5, 3, 2, 1, 1, 1, 1, 1, 1, 1],
                            backgroundColor: 'rgba(153, 102, 255, 0.5)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Descuentos',
                            data: [15, 10, 5, 4, 3, 2, 1, 1, 1, 1, 1, 1],
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        



        });
    </script>
@endsection
