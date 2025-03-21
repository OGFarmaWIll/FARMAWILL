$(document).ready(function(){
    listarReporteVenta( '', '');
});

$('#btn_buscar_ventas').click(function(){
    
    if(!validacion()){
        return;
    }

    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();
    listarReporteVenta(fecha_inicio, fecha_fin);
});


function listarReporteVenta(fecha_inicio, fecha_fin){
    $.ajax({
        url: '/ListarReporteVentaFechas',
        type: 'POST',
        data: {
            fecha_inicio: fecha_inicio,
            fecha_fin: fecha_fin
        },
        success: function(response){
            console.log(response);

            let template = '';

            $('#totalVentas').text(parseFloat(response.totalVentas).toFixed(2));

            response.ventas.forEach(function(venta){
                let cliente = venta.cliente;
                let detalle_venta = venta.detalle_venta;
                let tipo_pago = venta.tipo_pago;
                let usuario = venta.usuario;
                
                template += `
                <tr>
                    <td>
                       <button class="btn btn-sm btn-primary btn-detalleVenta" data-venta-id="${venta.c_idventa}" >
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>

                    <td>${venta.c_idventa}</td>
                    <td>${cliente.c_iddni || ''} ${cliente.c_nombres || ''}</td>
                    <td>${detalle_venta.length || 0}</td>
                    <td>${parseFloat(venta.c_total || 0).toFixed(2)}</td>
                    <td>${tipo_pago.c_desc || ''}</td>
                    <td>${usuario.c_nombre || ''}</td>
                    <td>${venta.c_fecharegistro || ''}</td>
                    <td>${parseFloat(0).toFixed(2)}</td>
                    <td>${parseFloat(0).toFixed(2)}</td>
                    <td>${parseFloat(0).toFixed(2)}</td>
                </tr>
                `;
            });

            $('#body_reporte_ventas').html(template);
           
        }
    });
}




$(document).on("click", ".btn-detalleVenta", function () {
    let idVenta = $(this).data("venta-id");
    window.location.href = "/datosDetalleVentaCaja/" + idVenta;
});



function validacion() {
  
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    

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
