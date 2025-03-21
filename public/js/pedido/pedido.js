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


$(document).on("click", ".agregarProductoVencido", function () {
    search = $(this).closest("tr").find(".producto").text();

    buscarProducto(search);

    $("#modalVencidos").modal("hide");
    $("#modalPocoStock").modal("hide");
});


$("#search").on("keyup", function () {
    let search = $(this).val();

    if (search !== "") {
        buscarProducto(search);
    }
});

function buscarProducto(search) {
    $.ajax({
        url: "buscarProductoPedido",
        type: "post",
        dataType: "json",
        data: { query: search },
        success: function (response) {
            console.log(response);

            let template = "";

            response.forEach(function (producto) {
                let laboratorio = producto.laboratorio;
                let proveedor = producto.proveedor;
                let presentacion = producto.presentaciones[0];

                template += `<tr id="${producto.c_idproducto}">
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${producto.c_idproducto}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${producto.c_idproducto}">
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
                    <td class="unidad">${presentacion.unidad_medida.c_desc}</td>
                    <td class="laboratorio">${laboratorio.c_desc}</td>
                    <td class="proveedor">${proveedor.c_desc || ""}</td>
                    <td class="precio">${
                        presentacion.c_preciocompra || "0.00"
                    }</td>
                    <td class="salidasEnero"> 0 </td>
                    <td class="salidasEnero"> 0 </td>
                    <td class="salidasEnero"> 0 </td>
                     <td class="stock">${producto.c_inventarioini || "0"}</td>

                </tr>`;
            });

            $("#body_productoReabastecer").html(template);
        },
    });
}

$(document).on("click", ".agregarProducto", function () {
    let fila = $(this).closest("tr");
    let idProducto = fila.attr("id");
    let producto = fila.find(".producto").text();
    let unidad = fila.find(".unidad").text();
    let laboratorio = fila.find(".laboratorio").text();
    let proveedor = fila.find(".proveedor").text();
    let precio = parseFloat(fila.find(".precio").text());
    let cantidad = parseInt(fila.find(".cantidad").val());

    if (isNaN(cantidad) || cantidad <= 0) {
        alertaAdvertencia("Ingrese una cantidad válida.");
        return;
    }

    let total = precio * cantidad;

    let template = `
        <tr id="${idProducto}">
            <td>
                <button class="btn btn-sm btn-danger eliminarProducto">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
            <td class="cantidad">${cantidad}</td>
            <td>${unidad}</td>
            <td>${producto}</td>
            <td>${laboratorio}</td>
            <td>${proveedor}</td>
            <td class="precio">${precio.toFixed(2)}</td>
            <td class="total">${total.toFixed(2)}</td>
        </tr>
    `;

    $("#Body_pedido").append(template);
    calcularTotalPedido();

    $("#search").val("");
    $("#body_productoReabastecer").empty();
});

$(document).on("click", ".eliminarProducto", function () {
    $(this).closest("tr").remove();
    calcularTotalPedido();
});

function calcularTotalPedido() {
    let subtotal = 0;

    $("#Body_pedido tr").each(function () {
        subtotal += parseFloat($(this).find(".total").text());
    });

    // let igv = subtotal * 0.18;
    let igv = 0;

    let total = subtotal + igv;
    $("#subtotalPedido").text(subtotal.toFixed(2));
    $("#igvPedido").text(igv.toFixed(2));
    $("#totalPedido").text(total.toFixed(2));
}

$("#FinalizarPedido").on("click", function () {
    let productos = [];

    $("#Body_pedido tr").each(function () {
        let idProducto = $(this).attr("id");
        let cantidad = $(this).find(".cantidad").val();

        productos.push({ idProducto, cantidad });
    });

    if (productos.length === 0) {
        alertaAdvertencia("No hay productos para procesar");
        return;
    }
});





$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarProducto(id);
    });
});



function eliminarProducto(id) {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/productos/${id}`,
        type: "DELETE",
        data: {
            _token: csrfToken
        },
        success: function (response) {
            ListarProductos();
        },
        error: function (xhr) {
            console.error("Error al eliminar laboratorio:", xhr);
        }
    });
}

