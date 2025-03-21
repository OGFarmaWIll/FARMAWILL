$(document).ready(function(){
    listarReporteVenta();
});


function listarReporteVenta(){
    $.ajax({
        url: '/ListarReporteVenta',
        type: 'GET',
        success: function(response){
            console.log(response);

            let template = '';

            $('#totalVentas').text(response.totalVentasHoy);

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
                    <td>${venta.c_total || 0}</td>
                    <td>${tipo_pago.c_desc || ''}</td>
                    <td>${usuario.c_nombre || ''}</td>
                    <td>${venta.c_fecharegistro || ''}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                `;
            });

            $('#body_reporte_venta').html(template);
           
        }
    });
}




$(document).on("click", ".btn-detalleVenta", function () {
    let idVenta = $(this).data("venta-id");
    window.location.href = "/datosDetalleVentaCaja/" + idVenta;
});



