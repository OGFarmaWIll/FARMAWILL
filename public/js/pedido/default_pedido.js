$("#sinStock").on("click", function () {
    listarProductosSinStock();
});

$("#vencidos").on("click", function () {
    listarProductosVencidos();
});

function listarProductosSinStock() {
    $.ajax({
        url: "/ListarProductosSinStock",
        type: "get",
        dataType: "json",
        success: function (response) {
            let template = "";

            if (response.length > 0) {
                response.forEach(function (producto) {
                    template += `<tr>
                        <td>
                            <button class="btn btn-success btn-sm agregarProductoVencido">
                                <i class="fas fa-download"></i> 
                            </button>
                        </td>
                        <td class="producto">${producto.c_nombre}</td>
                        <td>${producto.c_inventarioini}</td>
                        <td></td>
                    </tr>`;
                });
            } else {
                template = `<tr>
                    <td colspan="4" class="text-center">No hay productos sin stock</td>
                </tr>`;
            }

            $("#body_productoPocoStock").html(template);
            $("#modalPocoStock").modal("show");
        },
    });
}

function listarProductosVencidos() {
    $.ajax({
        url: "/ListarProductosVencidos",
        type: "get",
        dataType: "json",
        success: function (response) {
            let template = "";

            if (response.length > 0) {
                response.forEach(function (producto) {
                    template += `<tr>
                        <td>
                            <button class="btn btn-success btn-sm agregarProductoVencido">
                                <i class="fas fa-download"></i> 
                                </button>
                        </td>
                        <td class="producto">${producto.c_nombre}</td>
                        <td>${producto.c_inventarioini}</td>
                        <td>${producto.c_fechavenc}</td>
                    </tr>`;
                });
            } else {
                template = `<tr>
                    <td colspan="4" class="text-center">No hay productos vencidos</td>
                </tr>`;
            }

            $("#body_productoVencidos").html(template);
            $("#modalVencidos").modal("show");
        },
    });
}