$(document).ready(function () {
    const $paymentTabs = $("#paymentTabs .nav-link");
    const $totalVentas = $(".total-ventas");
    const $subTotalMixto = $(".sub-total");
    const $ventasTableBody = $("tbody");

    let ventasTotales = [];

    cargarVentas(2);

    $paymentTabs.on("click", function (e) {
        e.preventDefault();
        $paymentTabs.removeClass("active");
        $(this).addClass("active");
        cargarVentas($(this).data("id"));
    });

    function cargarVentas(tipoPagoId) {
        $.ajax({
            url: "/listarCaja",
            method: "GET",
            dataType: "json",
            success: (response) => procesarVentas(response, tipoPagoId),

            error: (xhr, status, error) =>
                console.error("Error al cargar las ventas:", error),
        });
    }

    function procesarVentas(data, tipoPagoId) {
        if (!data || !Array.isArray(data.ventas) || data.ventas.length === 0) {
            
            $('#caja_sinventas').removeClass('d-none'); 
            $('#caja_conventas').addClass('d-none'); 
            $('#caja_footer').addClass('d-none');

            actualizarTotales(0, 0);
            return;
        }

        $('#caja_sinventas').addClass('d-none');
        $('#caja_conventas').removeClass('d-none');
        $('#caja_footer').removeClass('d-none');

        ventasTotales = [];
        let ventasFiltradas = [];
        let subTotal = 0,
            totalVentas = 0;

        if (data && Array.isArray(data.ventas)) {
            data.ventas.forEach((venta) => {
                ventasTotales.push(venta);
                totalVentas += parseFloat(venta.c_total);
                if (venta.tipo_pago.c_tipopago === tipoPagoId) {
                    ventasFiltradas.push(venta);
                    subTotal += parseFloat(venta.c_total);
                }
            });
        }

        actualizarTabla(ventasFiltradas);
        actualizarTotales(subTotal, totalVentas);



    }

    function actualizarTabla(ventas) {
        $ventasTableBody.empty();

        if (ventas.length === 0) {
            $ventasTableBody.append(
                `<tr><td colspan="6" class="text-center text-muted">No hay ventas registradas.</td></tr>`
            );
            return;
        }

        ventas.forEach((venta) => {
            let cantidadVentas = venta.detalle_venta.length;
          
            $ventasTableBody.append(`
                <tr>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary  btn-detalleVenta"  
                             data-venta-id="${venta.c_idventa}" >
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                    <td>${cantidadVentas}</td>
                    <td>S/. ${venta.c_total.toFixed(2)}</td>
                    <td>${venta.usuario.c_nombre}</td>
                    <td>${venta.c_fecharegistro}</td>
                    <td>${venta.c_detalle || "Sin detalles"}</td>
                </tr>
            `);
        });
    }

    function actualizarTotales(subTotal, totalVentas) {
        $totalVentas.text(`S/. ${totalVentas.toFixed(2)}`);
        $subTotalMixto.text(`S/. ${subTotal.toFixed(2)}`);
    }
});

$("#cerrarCaja").on("click", function () {
    Swal.fire({
        title: "¿Estás seguro?",
        text: "Una vez cerrada la caja, no podrás revertir esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, cerrar caja",
        cancelButtonText: "Cancelar",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/cerrarCaja",
                method: "POST",
                success: (response) => {
                    Swal.fire({
                        title: "Caja cerrada",
                        text: "La caja se ha cerrado correctamente.",
                        icon: "success",
                    });
                    
                   
                    
                    $('#caja_sinventas').removeClass('d-none'); 
                    $('#caja_conventas').addClass('d-none'); 
                    $('#caja_footer').addClass('d-none'); 
                    
                    

                },
                error: (xhr, status, error) =>
                    console.error("Error al cerrar la caja:", error),
            });
        }
    });
});


$(document).on("click", ".btn-detalleVenta", function () {
    let idVenta = $(this).data("venta-id");
    window.location.href = "/datosDetalleVentaCaja/" + idVenta;
});



