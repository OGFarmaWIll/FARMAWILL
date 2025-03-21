<?php

namespace App\Http\Controllers\productos;

use App\Http\Controllers\Controller;
use App\Models\presentacion;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\UnidadMedida;
use App\Servicio\ImagenServicio;
use Carbon\Carbon;

class productosController extends Controller
{
    public function index()
    {
        return view('producto.index');
    }


    public function create()
    {
        return view('producto.crear');
    }

    public function listarProductosSinStock()
    {
        $productos = producto::where('c_inventarioini', 0)->get();
        return response()->json($productos);
    }

    public function listarProductosVencidos()
    {
        $hoy = Carbon::now()->format('Y-m-d');
        $productos = producto::where('c_fechavenc', '<', $hoy)->get();
        return response()->json($productos);
    }


    public function listarProductos()
    {
        $productos = producto::with([
            'categoria',
            'laboratorio',
            'proveedor',
            'presentaciones.unidadMedida'
        ])->get();

        $hoy = Carbon::now()->format('Y-m-d');
        $limiteVencimiento = Carbon::now()->addDays(30)->format('Y-m-d');

        $cantidadVencidos = producto::where('c_fechavenc', '<', $hoy)->count();
        $totalProductos = producto::count();
        $cantidadPocoStock = producto::where('c_minimaeninv', '<=', 10)->count();
        $cantidadPorVencer = producto::whereBetween('c_fechavenc', [$hoy, $limiteVencimiento])->count();

        return response()->json([
            'productos' => $productos,
            'cantidadVencidos' => $cantidadVencidos,
            'totalProductos' => $totalProductos,
            'cantidadPocoStock' => $cantidadPocoStock,
            'cantidadPorVencer' => $cantidadPorVencer
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'codigo_barras' => 'nullable|string|max:30',
            'nombre' => 'nullable|string|max:30',
            'categoria' => 'nullable|integer|exists:twl_categorias,c_idcategoria',
            'laboratorio' => 'nullable|integer|exists:twl_laboratorio,c_idlaboratorio',
            'proveedor' => 'nullable|integer|exists:twl_proveedor,c_idproveedor',
            'principio_activo' => 'nullable|string|max:100',
            'presentacion' => 'nullable|string|max:100',
            'registro_sanitario' => 'nullable|string|max:50',
            'ubicacion' => 'nullable|string|max:30',
            'lote' => 'nullable|string|max:30',
            'fecha_vencimiento' => 'nullable|date',
            'minimo_inventario' => 'nullable|numeric',
            'inventario_inicial' => 'nullable|numeric',
            'imagen' => 'nullable|image|max:2048',

            'unidad1' => 'nullable|string|max:50',
            'precio_compra_unidad1' => 'nullable|numeric',
            'ganancia_unidad1' => 'nullable|numeric',
            'precio_unidad1' => 'nullable|numeric',
            'comision_unidad1' => 'nullable|numeric',
            'unidad2' => 'nullable|string|max:50',
            'cantidad_unidad2' => 'nullable|numeric',
            'precio_unidad2' => 'nullable|numeric',
            'comision_unidad2' => 'nullable|numeric',
            'unidad3' => 'nullable|string|max:50',
            'cantidad_unidad3' => 'nullable|numeric',
            'precio_unidad3' => 'nullable|numeric',
            'comision_unidad3' => 'nullable|numeric',

        ]);

        $imagen = null;

        if ($request->hasFile('imagen')) {

            $imagen = ImagenServicio::subirImagen($request->file('imagen'), 'productos');
        }



        $producto = producto::create([
            'c_codigobarras' => $request->codigo_barras,
            'c_nombre' => $request->nombre,
            'c_idcategoria' => $request->categoria,
            'c_idlaboratorio' => $request->laboratorio,
            'c_idproveedor' => $request->proveedor,
            'c_principal' => $request->principio_activo,
            'c_presentacion' => $request->presentacion,
            'c_registrosanitario' => $request->registro_sanitario,
            'c_ubicacion' => $request->ubicacion,
            'c_lote' => $request->lote,
            'c_fechavenc' => $request->fecha_vencimiento,
            'c_minimaeninv' => $request->minimo_inventario,
            'c_inventarioini' => $request->inventario_inicial,
            'c_imagen' => $imagen
        ]);

        $productoId = $producto->getKey();

        $presentaciones = [
            [
                'c_idunidadmedida' => $request->unidad1,
                'c_idproducto' => $productoId,
                'c_preciocompra' => $request->precio_compra_unidad1,
                'c_gananciaunidad' => $request->ganancia_unidad1,
                'c_preciounidad' => $request->precio_unidad1,
                'c_comisionunidad' => $request->comision_unidad1,
                'c_cantidadunidad' => null,
            ]
        ];

        if ($request->unidad2) {
            $presentaciones[] = [
                'c_idunidadmedida' => $request->unidad2,
                'c_idproducto' => $productoId,
                'c_preciocompra' => null,
                'c_gananciaunidad' => null,
                'c_preciounidad' => $request->precio_unidad2,
                'c_comisionunidad' => $request->comision_unidad2,
                'c_cantidadunidad' => $request->cantidad_unidad2
            ];
        }

        if ($request->unidad3) {
            $presentaciones[] = [
                'c_idunidadmedida' => $request->unidad3,
                'c_idproducto' => $productoId,
                'c_preciocompra' => null,
                'c_gananciaunidad' => null,
                'c_preciounidad' => $request->precio_unidad3,
                'c_comisionunidad' => $request->comision_unidad3,
                'c_cantidadunidad' => $request->cantidad_unidad3
            ];
        }

        presentacion::insert($presentaciones);

        return response()->json(['mensaje' => 'Producto creado correctamente']);
    }

    public function destroy($id)
    {
        $producto = producto::find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        presentacion::where('c_idproducto', $id)->delete();

        $producto->delete();

        return response()->json(['mensaje' => 'Producto eliminado correctamente']);
    }


    public function edit($id)
    {
        $producto = Producto::with('presentaciones.unidadMedida')->find($id);

        return view('producto.editar', compact('producto'));
    }



    public function show($id)
    {
        $producto = producto::with([
            'categoria',
            'laboratorio',
            'proveedor',
            'presentaciones.unidadMedida'
        ])->find($id);

        if (!$producto) {
            return response()->json(['mensaje' => 'Producto no encontrado'], 404);
        }

        return response()->json(['producto' => $producto]);
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'codigo_barras' => 'nullable|string|max:30',
        'nombre' => 'nullable|string|max:30',
        'categoria' => 'nullable|integer|exists:twl_categorias,c_idcategoria',
        'laboratorio' => 'nullable|integer|exists:twl_laboratorio,c_idlaboratorio',
        'proveedor' => 'nullable|integer|exists:twl_proveedor,c_idproveedor',
        'principio_activo' => 'nullable|string|max:100',
        'presentacion' => 'nullable|string|max:100',
        'registro_sanitario' => 'nullable|string|max:50',
        'ubicacion' => 'nullable|string|max:30',
        'lote' => 'nullable|string|max:30',
        'fecha_vencimiento' => 'nullable|date',
        'minimo_inventario' => 'nullable|numeric',
        'inventario_inicial' => 'nullable|numeric',
        'imagen' => 'nullable|image|max:2048',

        'unidad1' => 'nullable|string|max:50',
        'precio_compra_unidad1' => 'nullable|numeric',
        'ganancia_unidad1' => 'nullable|numeric',
        'precio_unidad1' => 'nullable|numeric',
        'comision_unidad1' => 'nullable|numeric',

        'unidad2' => 'nullable|string|max:50',
        'cantidad_unidad2' => 'nullable|numeric',
        'precio_unidad2' => 'nullable|numeric',
        'comision_unidad2' => 'nullable|numeric',

        'unidad3' => 'nullable|string|max:50',
        'cantidad_unidad3' => 'nullable|numeric',
        'precio_unidad3' => 'nullable|numeric',
        'comision_unidad3' => 'nullable|numeric',
    ]);

    $producto = Producto::find($id);
    
    if ($request->hasFile('imagen')) {
        ImagenServicio::eliminarImagen($producto->c_imagen, 'productos');
        $imagen = ImagenServicio::subirImagen($request->file('imagen'), 'productos');
        $producto->c_imagen = $imagen;
    }

    $producto->update([
        'c_codigobarras' => $request->codigo_barras,
        'c_nombre' => $request->nombre,
        'c_idcategoria' => $request->categoria,
        'c_idlaboratorio' => $request->laboratorio,
        'c_idproveedor' => $request->proveedor,
        'c_principal' => $request->principio_activo,
        'c_presentacion' => $request->presentacion,
        'c_registrosanitario' => $request->registro_sanitario,
        'c_ubicacion' => $request->ubicacion,
        'c_lote' => $request->lote,
        'c_fechavenc' => $request->fecha_vencimiento,
        'c_minimaeninv' => $request->minimo_inventario,
        'c_inventarioini' => $request->inventario_inicial,
    ]);

    // Actualizar o insertar presentaciones
    $presentaciones = [
        [
            'id' => $request->idPresentacion_1,
            'unidad' => $request->unidad1,
            'precio_compra' => $request->precio_compra_unidad1,
            'ganancia' => $request->ganancia_unidad1,
            'precio' => $request->precio_unidad1,
            'comision' => $request->comision_unidad1,
            'cantidad' => null
        ],
        [
            'id' => $request->idPresentacion_2,
            'unidad' => $request->unidad2,
            'precio_compra' => null,
            'ganancia' => null,
            'precio' => $request->precio_unidad2,
            'comision' => $request->comision_unidad2,
            'cantidad' => $request->cantidad_unidad2
        ],
        [
            'id' => $request->idPresentacion_3,
            'unidad' => $request->unidad3,
            'precio_compra' => null,
            'ganancia' => null,
            'precio' => $request->precio_unidad3,
            'comision' => $request->comision_unidad3,
            'cantidad' => $request->cantidad_unidad3
        ],
    ];

    foreach ($presentaciones as $p) {
        if (!empty($p['unidad'])) {
            if (!empty($p['id'])) {
                // Si la presentación ya existe, la actualiza
                Presentacion::where('id_presentacion', $p['id'])->update([
                    'c_idunidadmedida' => $p['unidad'],
                    'c_preciocompra' => $p['precio_compra'],
                    'c_gananciaunidad' => $p['ganancia'],
                    'c_preciounidad' => $p['precio'],
                    'c_comisionunidad' => $p['comision'],
                    'c_cantidadunidad' => $p['cantidad'],
                ]);
            } else {
                // Si la presentación no existe, la crea
                Presentacion::create([
                    'c_idproducto' => $id,
                    'c_idunidadmedida' => $p['unidad'],
                    'c_preciocompra' => $p['precio_compra'],
                    'c_gananciaunidad' => $p['ganancia'],
                    'c_preciounidad' => $p['precio'],
                    'c_comisionunidad' => $p['comision'],
                    'c_cantidadunidad' => $p['cantidad'],
                ]);
            }
        }
    }

    return response()->json(['message' => 'Producto actualizado con éxito'], 200);
}



        

}
