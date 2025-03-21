// $(document).ready(function () {
//     listarDoctores();
// });

// function listarDoctores() {
//     $.ajax({
//         url: "/ListarDoctor",
//         type: "GET",
//         success: function (response) {
//             console.log(response);

//             let template = '<option selected value="0">Todos</option>';

//             response.forEach(function (doctor) {
//                 template += `
//                 <option value="${doctor.c_iddoctor}">${doctor.c_nombres}</option>
//                 `;
//             });

//             $("#doctor_select").html(template);
//         },
//     });
// }

$("#btn_buscar_usuario").click(function () {
    let usuario_id = $("#usuario_select").val();
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    listarReporteUsuario(usuario_id, fecha_inicio, fecha_fin);
});

function listarReporteUsuario(usuario_id, fecha_inicio, fecha_fin) {
    if (!validacion()) {
        return false;
    }

    $.ajax({
        url: "/ListarReporteDoctor",
        type: "POST",
        data: {
            usuario_id: usuario_id,
            fecha_inicio: fecha_inicio,
            fecha_fin: fecha_fin,
        },
        success: function (response) {
            console.log(response);

            let template = "";

            $("#total_ventas_usuario").text(
                parseFloat(response.totalVentas || 0).toFixed(2)
            );

            response.ventas.forEach(function (venta) {
                let usuario = venta.usuario;
                let detalle_venta = venta.detalle_venta;
                let tipo_pago = venta.tipo_pago;

                template += `
                <tr>
                    <td>
                         <a class="btn btn-sm btn-primary btn-detalleVenta" href="/datosDetalleVentaCaja/${
                             venta.c_idventa
                         }" >
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>

                   <td>${usuario.c_nombre || ""}</td>
                    <td>${detalle_venta.length || 0}</td>
                    <td>S/. ${parseFloat(venta.c_subtotal || 0).toFixed(2)}</td>
                    <td>S/. ${parseFloat(venta.c_descuento || 0).toFixed(
                        2
                    )}</td>
                    <td>S/. ${parseFloat(venta.c_total || 0).toFixed(2)}</td>
                    <td>${venta.c_fecharegistro}</td>
                    <td>${tipo_pago.c_desc || ""}</td>
                </tr>
                `;
            });

            $("#body_reporte_usuario").html(template);
            $("#mostrar_reporte_usuario").removeClass("d-none");
        },
    });
}

function validacion() {
    let usuario_id = $("#usuario_select").val();
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    if (usuario_id == "") {
        alertaAdvertencia("Debe seleccionar un usuario");
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
