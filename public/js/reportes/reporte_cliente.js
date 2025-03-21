// $(document).ready(function () {
//     listarClientes();
// });

// function listarClientes(){
//     $.ajax({
//         url: "/ListarCliente",
//         type: "GET",
//         success: function(response){
//             console.log(response);

//             let template = '<option selected value="0">Todos</option>';

//             response.forEach(function(cliente){
//                 template += `<option value="${cliente.c_idcliente}">${cliente.c_nombres}</option>`;
//             }); 

//             $("#cliente_select").html(template);
//         }
//     });
// }

$("#btn_buscar_cliente").click(function(){
    let cliente_id = $("#cliente_select").val();
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    listarReporteCliente(cliente_id, fecha_inicio, fecha_fin);
});


function listarReporteCliente(cliente_id, fecha_inicio, fecha_fin) {
    if (!validacion()) {
        return false;
    }

    $.ajax({
        url: "/ListarReporteCliente",
        type: "POST",
        data: {
            cliente_id: cliente_id,
            fecha_inicio: fecha_inicio,
            fecha_fin: fecha_fin,
        },
        success: function (response) {
            console.log(response);

            let template = "";

            $("#total_ventas_cliente").text(parseFloat(response.totalVentas || 0).toFixed(2));

            
            response.ventas.forEach(function (venta) {
                let cliente = venta.cliente;
                let detalle_venta = venta.detalle_venta;
                let tipo_pago = venta.tipo_pago;
                let usuario = venta.usuario;

                template += `
                <tr>
                    <td>
                         <a class="btn btn-sm btn-primary btn-detalleVenta" href="/datosDetalleVentaCaja/${venta.c_idventa}" >
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>

                    <td>${cliente.c_nombres || ''}</td>
                    <td>${usuario.c_nombre || ''}</td>
                    <td>${detalle_venta.length || 0}</td>
                    <td>S/. ${parseFloat(venta.c_subtotal || 0).toFixed(2)}</td>
                    <td>S/. ${parseFloat(venta.c_descuento || 0).toFixed(2)}</td>
                    <td>S/. ${parseFloat(venta.c_total || 0).toFixed(2)}</td>
                    <td>${venta.c_fecharegistro}</td>
                    <td>${tipo_pago.c_desc || ""}</td>
                </tr>
                `;
            });

            $("#body_reporte_cliente").html(template);
            $("#mostrar_reporte_cliente").removeClass("d-none");
        },
    });
}



function validacion() {
    let cliente_id = $("#cliente_select").val();
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    if (cliente_id == "") {
        alertaAdvertencia("Debe seleccionar un cliente");
        return false;
    }

    if (fecha_inicio == "") {
        alertaAdvertencia("Debe seleccionar una fecha de inicio");
        return false;
    }

    if (fecha_fin == "") {
        alertaAdvertencia("Debe seleccionar una fecha de fin");
        return false;
    }

    return true;
}
