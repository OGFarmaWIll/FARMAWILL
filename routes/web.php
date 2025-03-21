<?php
use App\Http\Middleware\TienePermiso;

use App\Http\Controllers\categorias\categoriasController;
use App\Http\Controllers\login\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laboratorio\laboratorioController;
use App\Http\Controllers\cliente\clienteController;
use App\Http\Controllers\doctor\doctorController;
use App\Http\Controllers\proveedor\proveedorController;
use App\Http\Controllers\productos\productosController;
use App\Http\Controllers\inicio\inicioController;
use App\Http\Controllers\productos\unidadMedidadControlller;
use App\Http\Controllers\vender\venderController;
use App\Http\Controllers\caja\cajaController;
use App\Http\Controllers\inventario\inventarioController;
use App\Http\Controllers\reabastecimiento\reabastecimientoController;
use App\Http\Controllers\pedidos\pedidosController;
use App\Http\Controllers\guia_remision\guia_remisionController;
use App\Http\Controllers\reportes\reporte_ventaController;
use App\Http\Controllers\reportes\reporte_clienteController;
use App\Http\Controllers\reportes\reporte_doctorController;
use App\Http\Controllers\reportes\reporte_usuarioController;
use App\Http\Controllers\rolesController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [loginController::class, 'login']);

Route::middleware(['auth'])->group(function () {

    Route::resource('/categorias', categoriasController::class);
    Route::get('/ListarCategoria', [categoriasController::class, 'ListarCategoria']);

    Route::resource('/laboratorios', laboratorioController::class);
    Route::get('/ListarLaboratorio', [laboratorioController::class, 'ListarLaboratorio']);

    Route::resource('/clientes', clienteController::class);
    Route::get('/ListarCliente', [clienteController::class, 'ListarCliente']);

    Route::resource('/doctores', doctorController::class);
    Route::get('/ListarDoctor', [doctorController::class, 'ListarDoctor']);

    Route::resource('/proveedores', proveedorController::class);
    Route::get('/ListarProveedores', [proveedorController::class, 'ListarProveedores']);

    Route::resource('/productos', productosController::class);
    Route::get('/ListarProductos', [productosController::class, 'listarProductos']);
    Route::get('/ListarProductosSinStock', [productosController::class, 'listarProductosSinStock']);
    Route::get('/ListarProductosVencidos', [productosController::class, 'listarProductosVencidos']);

    Route::resource('/inicio', inicioController::class);
    Route::resource('/UnidadMedida', unidadMedidadControlller::class);

    Route::resource('/vender', venderController::class);
    Route::post('/vender/buscarProducto', [venderController::class, 'buscarProducto']);
    Route::get('ReporteVenta', [venderController::class, 'ReporteVenta'])->name('ReporteVenta');

    Route::get('/listarTipoDocumento', [venderController::class, 'listarTipoDocumento']);
    Route::get('/listarTipoPago', [venderController::class, 'listarTipoPago']);

    Route::resource('/caja', cajaController::class);
    Route::get('/listarCaja', [cajaController::class, 'listarCaja']);

    Route::get('/historialCaja', [cajaController::class, 'historialCaja'])->name('historialCaja');
    Route::get('/ListarHistorialCaja', [cajaController::class, 'ListarHistorialCaja']);
    Route::post('/cerrarCaja', [cajaController::class, 'cerrarCaja']);
    Route::get('/datosDetalleVentaCaja/{idVenta}', [cajaController::class, 'datosDetalleVentaCaja']);
    Route::post('/ListarHistorialCajaPorFechas', [cajaController::class, 'ListarHistorialCajaPorFechas']);
    Route::get('/listarCierrecajaSeleccionada/{idcierre}', [cajaController::class, 'listarCierrecajaSeleccionada']);

    Route::get('ObtenerReporteVenta/{id}', [venderController::class, 'ObtenerReporteVenta']);

    Route::resource('/inventario', inventarioController::class);
    Route::get('/listarInventario', [inventarioController::class, 'listarInventario']);
    
    Route::resource('/reabastecimiento', reabastecimientoController::class);
    Route::post('/ReabastecimientoStock', [reabastecimientoController::class, 'ReabastecimientoStock']);

    Route::resource('/pedidos', pedidosController::class);
    Route::post('/buscarProductoPedido', [pedidosController::class, 'buscarProductoPedido']);

    Route::resource('/guia_remision', guia_remisionController::class);


    Route::resource('/reporte_venta', reporte_ventaController::class);
    Route::get('/ListarReporteVenta', [reporte_ventaController::class, 'ListarReporteVenta']);
    Route::get('/vistaReporteVenta', [reporte_ventaController::class, 'vistaReporteVenta'])->name('vistaReporteVenta');
    
    
    Route::resource('/reporte_cliente', reporte_clienteController::class);
    Route::post('/ListarReporteCliente', [reporte_clienteController::class, 'ListarReporteCliente']);


    Route::resource('/reporte_doctor', reporte_doctorController::class);
    Route::post('/ListarReporteDoctor', [reporte_doctorController::class, 'ListarReporteDoctor']);

    Route::resource('/reporte_usuario', reporte_usuarioController::class);

    Route::post('/ListarReporteVentaFechas', [reporte_ventaController::class, 'ListarReporteVentaFechas']);

    Route::resource('/roles', rolesController::class);
    Route::post('/guardarRol', [rolesController::class, 'guardarRol']);
    Route::get('/listarPermisos', [rolesController::class, 'listarPermisos']);
    Route::get('/ListarRoles', [rolesController::class, 'ListarRoles']);
    Route::get('/listarUsuarios', [rolesController::class, 'listarUsuarios']);

    
    
});


Route::get('/dashboard', function () {
    return view('inicio.index');
});
