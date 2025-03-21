
$('#search').on('keyup', function () {
    let search = $(this).val();
    if (search !== '') {
        $.ajax({
            url: "vender/buscarProducto",
            type: "post",
            dataType: "json",
            data: { query: search },
            success: function (response) {
                console.log(response);
                let html = '';
                let fechaHoy = new Date().toISOString().split('T')[0]; 

                response.forEach((producto) => {
                    let opciones = '';
                    if (producto.presentaciones?.length > 0) {
                        producto.presentaciones.forEach(presentacion => {
                            opciones += `<option value="${presentacion.unidad_medida.c_idunidadmedida}" data-precio="${presentacion.c_preciounidad}">
                                            ${presentacion.unidad_medida.c_desc}
                                         </option>`;
                        });
                    } else {
                        opciones = `<option value="">Sin presentaciones</option>`;
                    }

                    let fechaVencimiento = producto.c_fechavenc ? producto.c_fechavenc : '';
                    let inventarioCero = producto.c_inventarioini == 0;
                    let vencido = fechaVencimiento && fechaVencimiento <= fechaHoy;

                    let botonAgregar = (!inventarioCero && !vencido) ? `
                        <button class="btn btn-success btn-agregar-producto"
                            data-producto-id="${producto.c_idproducto}"
                            data-producto-nombre="${producto.c_nombre}"
                            data-producto-ubicacion="${producto.c_ubicacion || ''}">
                            <i class="fas fa-download"></i> 
                        </button>
                    ` : ''; 

                    html += `
                        <tr>
                            <td>
                              <input type="number" class="form-control cantidad-producto" min="1" value="1" style="width: 80px; display: inline-block;">
                                <select class="form-select unidad-medida" style="width: auto; display: inline-block;">${opciones}</select>
                                ${botonAgregar}
                            </td>
                            <td>${producto.c_nombre || ''}</td>
                            <td class="precio-producto">${producto.presentaciones[0]?.c_preciounidad || '0.00'}</td>
                            <td>Similinar</td>
                            <td>C</td>
                            <td>
                                ${producto.categoria?.c_desc || ''}
                                <strong>${producto.categoria?.c_tipo || ''}</strong>
                            </td>
                            <td>
                                ${producto.laboratorio?.c_desc || ''}
                                <strong>${producto.laboratorio?.c_tipo || ''}</strong>
                            </td>
                            <td>${producto.c_principal || ''}</td>
                            <td>${producto.c_presentacion || ''}</td>
                            <td>${producto.c_inventarioini ?? ''}</td>
                            <td>${producto.c_fechavenc ? formatoFecha(producto.c_fechavenc) : ''}</td>
                            <td>XD</td>
                        </tr>
                    `;
                });
                $('#body_productoVender').html(html);
            }
        });
    }else{
        $('#body_productoVender').html('');
    }
});



function formatoFecha(fecha) {
    let partes = fecha.split(" ")[0].split("-"); 
    return `${partes[2]}-${partes[1]}-${partes[0]}`;
}


$(document).on('change', '.unidad-medida', function () {
    let selectedPrice = $(this).find('option:selected').data('precio');
    $(this).closest('tr').find('.precio-producto').text(selectedPrice);
});


$(document).on('click', '.btn-agregar-producto', function () {

    let $row = $(this).closest('tr');

    let productoId = $(this).data('producto-id');
    let productoNombre = $(this).data('producto-nombre');
    let productoUbicacion = $(this).data('producto-ubicacion');
    
    
    let $select = $row.find('.unidad-medida');
    let presentacionId = $select.val();
    let unidadTexto = $select.find('option:selected').text();
    let idUnidad = $select.find('option:selected').val();
    let precioUnitario = parseFloat($select.find('option:selected').data('precio')) || 0.00;
    
    
    let cantidad = parseInt($row.find('.cantidad-producto').val()) || 1;
    
    let key = productoId + '_' + presentacionId;
    
    let $existingRow = $('#listaVentaBody').find(`tr[data-key="${key}"]`);
    
    if ($existingRow.length > 0) {
      
        let $qtyCell = $existingRow.find('.cantidad-linea');
        let currentQty = parseInt($qtyCell.text()) || 0;
        let newQty = currentQty + cantidad;
        $qtyCell.text(newQty);

        $existingRow.find('.total-linea').text((newQty * precioUnitario).toFixed(2));
    } else {

        let lineaTotal = (cantidad * precioUnitario).toFixed(2);
        let newRow = `
            <tr data-key="${key}">
                <td>
                    <button class="btn btn-sm btn-danger btn-eliminar-linea">X</button>
                </td>
                <td class="cantidad-linea">${cantidad}</td>
                <td class="unidadTipo-linea" data-id="${idUnidad}" >${unidadTexto}</td>
                <td class="producto-linea" data-id="${productoId}" >${productoNombre}</td>
                <td class="precio-unitario">${precioUnitario.toFixed(2)}</td>
                <td class="total-linea">${lineaTotal}</td>
                <td class="descuento-linea" >0.00</td>
                <td>${productoUbicacion}</td>
            </tr>
        `;
        $('#listaVentaBody').append(newRow);
    }

    updateResumenVenta();
});

function updateResumenVenta() {
    let subtotal = 0;

    $('#listaVentaBody tr').each(function () {
        let lineTotal = parseFloat($(this).find('.total-linea').text()) || 0;
        subtotal += lineTotal;
    });

    let descuentoAdicional = parseFloat($('#descuentoAdicional').val()) || 0;
    
    let igv = 0;
    let banco = 0;
    
    let total = subtotal - descuentoAdicional + igv + banco;

    $('#subtotalVenta').text( subtotal.toFixed(2));
    $('#descuentoVenta').text(  descuentoAdicional.toFixed(2));
    $('#igvVenta').text( igv.toFixed(2));
    $('#bancoVenta').text(  banco.toFixed(2));
    $('#totalVenta').text( total.toFixed(2));
}

$(document).on('click', '.btn-eliminar-linea', function () {
    $(this).closest('tr').remove();
    updateResumenVenta();
});

$(document).on('input', '#descuentoAdicional', function () {
    updateResumenVenta();
});














