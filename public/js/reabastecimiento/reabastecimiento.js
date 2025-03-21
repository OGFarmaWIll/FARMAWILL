$(document).ready(function () {
    listarProveedores();
});

function listarProveedores() {
    $.ajax({
        url: "/ListarProveedores",
        type: "get",
        dataType: "json",
        success: function (response) {
            response.forEach(function (proveedor) {
                $("#proveedor").append(
                    `<option value="${proveedor.c_idproveedor}">${proveedor.c_desc}</option>`
                );
            });
        },
    });
}

$("#search").on("keyup", function () {
    let search = $(this).val();

    if (search !== "") {
        $.ajax({
            url: "vender/buscarProducto",
            type: "post",
            dataType: "json",
            data: { query: search },
            success: function (response) {
                let template = "";
                console.log(response);

                response.forEach((producto) => {
                    let laboratorio = producto.laboratorio;
                    let proveedor = producto.proveedor;
                    let presentaciones = producto.presentaciones[0];

                    template += `
                            <tr id="${producto.c_idproducto}">
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary btn-editar"
                                    data-id="${producto.c_idproducto}">
                                        <i class="fas fa-edit"></i> 
                                    </button>
 
                                    <button class="btn btn-sm btn-danger btn-eliminar" 
                                    data-id="${producto.c_idproducto}">
                                        <i class="fas fa-trash"></i> 
                                    </button>

                                </td>
                                <td class="text-center">
                                    <input type="number" class="form-control cantidad" >
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm agregarProducto">
                                     <i class="fas fa-download"></i> 
                                     </button>
                                </td>
                                <td class="producto">${producto.c_nombre}</td>
                                <td class="unidad">${
                                    presentaciones.unidad_medida.c_desc
                                }</td>
                                <td class="laboratorio">${
                                    laboratorio.c_desc
                                }</td>
                                <td class="proveedor">${
                                    proveedor.c_desc || ""
                                }</td>
                                <td class="lote">${producto.c_lote || ""}</td>
                                <td class="registro">${
                                    producto.c_registrosanitario || ""
                                }</td>
                                <td class="fecha">${
                                    producto.c_fechavenc
                                        ? producto.c_fechavenc.split(" ")[0]
                                        : ""
                                }</td>
                                <td class="precio">${
                                    presentaciones.c_preciounidad || "0.00"
                                }</td>
                                <td class="stock">${
                                    producto.c_inventarioini || "0"
                                }</td>
                            </tr>
                        `;
                });

                $("#body_productoReabastecer").html(template);
            },
        });
    } else {
        $("#body_productoReabastecer").html("");
    }
});

function calcularTotales() {
    let subtotal = 0;

    $("#Body_reabastecimiento tr").each(function () {
        let precioTotal = parseFloat($(this).find("td:eq(9)").text());
        subtotal += precioTotal;
    });

    $("#subtotalReabastecimiento").text(subtotal.toFixed(2));
    $("#igvReabastecimiento").text("0.00");
    $("#totalReabastecimiento").text(subtotal.toFixed(2));
}

$(document).on("click", ".agregarProducto", function () {
    let fila = $(this).closest("tr");

    let cantidad = parseInt(fila.find(".cantidad").val());

    if (isNaN(cantidad) || cantidad <= 0) {
        alertaAdvertencia("Ingrese una cantidad válida.");
        return;
    }

    fila.find(".cantidad").val("");

    let idProducto = fila.attr("id");
    let producto = fila.find(".producto").text();
    let unidad = fila.find(".unidad").text();
    let laboratorio = fila.find(".laboratorio").text();
    let proveedor = fila.find(".proveedor").text();
    let lote = fila.find(".lote").text();
    let registro = fila.find(".registro").text();
    let fecha = fila.find(".fecha").text();
    let precioUnitario = parseFloat(fila.find(".precio").text());

    let productoExistente = false;

    $("#Body_reabastecimiento tr").each(function () {
        let productoFila = $(this).find("td:eq(2)").text();
        let loteFila = $(this).find("td:eq(5)").text();

        if (productoFila === producto && loteFila === lote) {
            productoExistente = true;
            let cantidadActual = parseInt($(this).find("td:eq(0)").text());
            let nuevaCantidad = cantidadActual + cantidad;
            let nuevoPrecioTotal = (precioUnitario * nuevaCantidad).toFixed(2);
            $(this).find("td:eq(0)").text(nuevaCantidad);
            $(this).find("td:eq(9)").text(nuevoPrecioTotal);
            return false;
        }
    });

    if (!productoExistente) {
        let precioTotal = (precioUnitario * cantidad).toFixed(2);
        let nuevaFila = `
                <tr id="${idProducto}">
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger eliminarProductoFila">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                    <td class="cantidad">${cantidad}</td>
                    <td>${unidad}</td>
                    <td>${producto}</td>
                    <td>${laboratorio}</td>
                    <td>${proveedor}</td>
                    <td>${lote}</td>
                    <td>${registro}</td>
                    <td>${fecha.split(" ")[0]}</td>
                    <td>${precioUnitario}</td>
                    <td>${precioTotal}</td>
                </tr>
            `;
        $("#Body_reabastecimiento").append(nuevaFila);
    }

    calcularTotales();
});

function limpiarReabastecimiento() {
    $("#Body_reabastecimiento").empty();
    $("#search").val("");
    $("#body_productoReabastecer").empty();
    $("#subtotalReabastecimiento").text("0.00");
    $("#igvReabastecimiento").text("0.00");
    $("#totalReabastecimiento").text("0.00");
}

$("#FinalizarReabastecimiento").on("click", function () {
    let productos = [];

    $("#Body_reabastecimiento tr").each(function () {
        let idProducto = $(this).attr("id");
        let cantidad = parseInt($(this).find(".cantidad").text());

        productos.push({
            idProducto: idProducto,
            cantidad: cantidad,
        });
    });

    if (productos.length === 0) {
        alertaAdvertencia("No hay productos para reabastecer");
        return;
    }

    $.ajax({
        url: "ReabastecimientoStock",
        type: "POST",
        data: {
            productos: productos,
        },
        success: function (response) {
            if (response.success) {
                alertaExito(response.mensaje);
                limpiarReabastecimiento();
            }
        },
        error: function (xhr, status, error) {
            alertaError("Error al procesar el reabastecimiento");
        },
    });
});

$(document).on("click", ".btn-editar", function () {
    let id = $(this).data("id");
    window.location.href = `/productos/${id}/edit`;
});

$(document).on("click", ".btn-eliminar", function () {
    let id = $(this).data("id");
    alertaEliminar(() => {
        eliminarProducto(id);
    });
});

function eliminarProducto(id) {
    $.ajax({
        url: `/productos/${id}`,
        type: "DELETE",
        data: {
            _token: csrfToken,
        },
        success: function (response) {
            ListarProductos();
        },
        error: function (xhr) {
            console.error("Error al eliminar laboratorio:", xhr);
        },
    });
}

$(document).on("click", ".eliminarProductoFila", function () {
    $(this).closest("tr").remove();
    calcularTotales();
   
});


