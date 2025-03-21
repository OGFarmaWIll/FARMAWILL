$('#FinalizarVenta').click(function() {
    let formData = new FormData();
    
    formData.append('doctorVender', $('#doctorVender').val());
    formData.append('clienteVender', $('#clienteVender').val());
    formData.append('tipo_documentoVender', $('#tipo_documento').val());
    formData.append('descuentoAdicional', $('#descuentoAdicional').val());
    formData.append('tipoPago', $('#formaPago').val());
    formData.append('subTotal', parseFloat($('#subtotalVenta').text().trim()) || 0);
    formData.append('descuentoVenta', parseFloat($('#descuentoVenta').text().trim()) || 0);
    formData.append('igvVenta', parseFloat($('#igvVenta').text().trim()) || 0);
    formData.append('totalVenta', parseFloat($('#totalVenta').text().trim()) || 0);
    formData.append('detalleMixto', $('#detalleMixto').val());


    
    let productos = []; 

    $('#listaVentaBody tr').each(function() {
        let producto = {
            c_cantidad: $(this).find('.cantidad-linea').text().trim(),
            idUnidad: $(this).find('.unidadTipo-linea').data('id'),
            c_ididproducto: $(this).find('.producto-linea').data('id'),
            c_Preciounitario: $(this).find('.precio-unitario').text().trim(),
            c_preciototal: $(this).find('.total-linea').text().trim(),
            c_Desc: $(this).find('.descuento-linea').text().trim()
        };
        
        productos.push(producto); 
    });

    formData.append('productos', JSON.stringify(productos));

    $.ajax({
        url: '/vender',
        type: 'POST',
        data: formData,
        processData: false, 
        contentType: false, 
        dataType: 'json',
        success: function(response) {
            if(response.status == 'success') {
                alertaExito(response.mensaje);
                window.open('/ReporteVenta');
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });  
});
