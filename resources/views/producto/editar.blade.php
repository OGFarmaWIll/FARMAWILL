@extends('layout.dashboard')

@section('contenido')

<div class="container ">
    <div class="row">
        <input type="text"  id="idProducto" value="{{$producto->c_idproducto}}" hidden>

        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Datos Generales</h5>
                    
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Imagen</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="imagen">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Código de Barras</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="codigo_barras" value="{{$producto->c_codigobarras }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" value="{{$producto->c_nombre}}" >
                            <span id="error-nombre" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Categoría</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="categoria">
                                <option value="">Seleccione una categoría</option>
                            </select>
                            <span id="error-categoria" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Laboratorio</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="laboratorio">
                                <option value="">Seleccione un laboratorio</option>
                            </select>
                            <span id="error-laboratorio" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Proveedor</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="proveedor">
                                <option value="">Seleccione un proveedor</option>
                            </select>
                            <span id="error-proveedor" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Principio Activo</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="1" id="principio_activo" value="{{$producto->c_principal}}" ></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Presentación</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="presentacion" value="{{$producto->c_presentacion}}" > 
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Registro Sanitario</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="registro_sanitario" value="{{$producto->c_registrosanitario}}" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Ubicación</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ubicacion" value="{{$producto->c_ubicacion}}" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Lote</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lote" value="{{$producto->c_lote}}" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Fecha de Vencimiento</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="fecha_vencimiento" value="{{ \Carbon\Carbon::parse($producto->c_fechavenc)->format('Y-m-d') }}">

                            <span id="error-fecha-vencimiento" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Mínimo en Inventario</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="minimo_inventario" value="{{$producto->c_minimaeninv}}" > 
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Inventario Inicial</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="inventario_inicial" value="{{$producto->c_inventarioini}}" > 
                            <span id="error-inventario-inicial" class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna 2: Unidades de Venta -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Unidades de Venta</h5>

                     <!-- Unidad 1 -->
                    <input type="text" id="idPresentacion_1" 
                    value=" {{ isset($producto->presentaciones[0]) ? $producto->presentaciones[0]->id_presentacion   : '' }}"
                    hidden>
                   
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Unidad 1 - Pequeña</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="unidad1">
                               
                            </select>
                            <span id="error-unidad1" class="text-danger"></span>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Precio Compra Unidad 1</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="precio_compra_unidad1" 
                            value="{{ $producto->presentaciones[0]->c_preciocompra  }}" >
                            <span id="error-precio-compra-unidad1" class="text-danger"></span>
                        </div>
                    </div>
                 
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">% Ganancia Unidad 1</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="ganancia_unidad1" 
                            value="{{ $producto->presentaciones[0]->c_gananciaunidad }}" >

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Precio de Unidad 1</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="precio_unidad1"
                            value="{{ $producto->presentaciones[0]->c_preciounidad  }}" >
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Comisión de Unidad 1</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="comision_unidad1"
                            value="{{ $producto->presentaciones[0]->c_comisionunidad   }}" >
                        </div>
                    </div>

                     <!-- Unidad 2 -->

                    <input type="text" id="idPresentacion_2" 
                    value=" {{ isset($producto->presentaciones[1]) ? $producto->presentaciones[1]->id_presentacion   : '' }}"
                    hidden>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label"> Unidad 2 - Mediana </label>
                        <div class="col-sm-4">
                            <select class="form-select" id="unidad2">
                               		  			  
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Cantidad en Unidad 2</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="cantidad_unidad2"
                            value="{{ isset($producto->presentaciones[1]) ? $producto->presentaciones[1]->c_cantidadunidad : '' }}"  >

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Precio de Unidad 2</label>
                        <div class="col-sm-8">
                    
                            <input type="number" class="form-control" id="precio_unidad2"
                            value="{{ isset($producto->presentaciones[1]) ? $producto->presentaciones[1]->c_preciounidad : '' }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Comisión de Unidad 2</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="comision_unidad2"
                            value="{{ isset($producto->presentaciones[1]) ? $producto->presentaciones[1]->c_comisionunidad : '' }}">

                        </div>
                    </div>

                    <!-- Unidad 3 -->
                    <input type="text" id="idPresentacion_3" 
                   value=" {{ isset($producto->presentaciones[2]) ? $producto->presentaciones[2]->id_presentacion   : '' }}"
                   hidden >

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label"> Unidad 3 - Grande </label>
                        <div class="col-sm-8">
                            <select class="form-select" id="unidad3">
                              
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Cantidad en Unidad 3</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="cantidad_unidad3"
                            value="{{ isset($producto->presentaciones[2]) ? $producto->presentaciones[2]->c_cantidadunidad : '' }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Precio de Unidad 3</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="precio_unidad3"
                            value="{{ isset($producto->presentaciones[2]) ? $producto->presentaciones[2]->c_preciounidad : '' }}">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Comisión de Unidad 3</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="comision_unidad3"
                            value="{{ isset($producto->presentaciones[2]) ? $producto->presentaciones[2]->c_comisionunidad : '' }}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary me-2 " id="actualizarProducto" >Actualizar producto</button>
        <button class="btn btn-secondary" onclick=" window.history.back();">Regresar</button>
    </div>
</div>



<script src="{{ asset('js/producto/defaultProducto.js') }}"></script>
<script src="{{ asset('js/producto/productoEditar.js') }}"></script>


@endsection
