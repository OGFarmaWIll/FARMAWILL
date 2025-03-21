
$('#tipo_select').on('change', function() {
    let tipo = $(this).val();
    
    if (tipo == 0) {
        $('#origen').addClass('d-none');
        $('#destino').addClass('d-none');
    }
    else if (tipo == 1) {
        $('#origen').removeClass('d-none');
        $('#destino').addClass('d-none');
    } else {
        $('#origen').addClass('d-none');
        $('#destino').removeClass('d-none');
    }
    
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
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn btn-sm btn-danger">
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
                    <td class="lote">${producto.c_lote || ""}</td>
                    <td class="registroSanitario"> ${producto.c_registrosanitario || ""} </td>
                    <td class="fechaVencimiento"> ${producto.c_fechavenc || ""} </td>
                    <td class="precioUnitario"> ${presentacion.c_preciounidad || "0.00"} </td>
                     <td class="stock">${producto.c_inventarioini || "0"}</td>

                </tr>`;
            });

            $("#body_productoGuiaRemision").html(template);
        },
    });
}



function calcularTotalPedido() {
    let subtotal = 0;

    $("#body_guiaRemision tr").each(function () {
        subtotal += parseFloat($(this).find(".total").text());
    });

    // let igv = subtotal * 0.18;
    let igv = 0;

    let total = subtotal + igv;
    $("#subtotalGuiaRemision").text(subtotal.toFixed(2));
    $("#igvGuiaRemision").text(igv.toFixed(2));
    $("#totalGuiaRemision").text(total.toFixed(2));
}



$("#FinalizarGuiaRemision").on("click", function () {
    let productos = [];

    $("#body_guiaRemision tr").each(function () {
        let idProducto = $(this).attr("id");
        let cantidad = $(this).find(".cantidad").val();

        productos.push({ idProducto, cantidad });
    });

    if (productos.length === 0) {
        alertaAdvertencia("No hay productos para procesar");
        return;
    }
});


$(document).on("click", ".agregarProducto", function () {
    let fila = $(this).closest("tr");
    let idProducto = fila.attr("id");
    let producto = fila.find(".producto").text();
    let unidad = fila.find(".unidad").text();
    let laboratorio = fila.find(".laboratorio").text();
    let proveedor = fila.find(".proveedor").text();
    let precio = parseFloat(fila.find(".precioUnitario").text());
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

    $("#body_guiaRemision").append(template);
    calcularTotalPedido();

    $("#search").val("");
    $("#body_productoGuiaRemision").empty();
    
});



$(document).on("click", ".agregarProductoVencido", function () {
    search = $(this).closest("tr").find(".producto").text();

    buscarProducto(search);

    $("#modalVencidos").modal("hide");
    $("#modalPocoStock").modal("hide");

});

