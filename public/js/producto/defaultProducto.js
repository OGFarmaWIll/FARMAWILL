




$('#precio_compra_unidad1, #ganancia_unidad1').on('input', function() {
    let precioCompra = parseFloat($('#precio_compra_unidad1').val()) || 0;
    let ganancia = parseFloat($('#ganancia_unidad1').val()) || 0;
    
    let precioVenta = precioCompra + (precioCompra * ganancia / 100);
    $('#precio_unidad1').val(precioVenta.toFixed(2));
});




function validacion() {
    let nombre = $('#nombre').val().trim();
    let categoria = $('#categoria').val();
    let laboratorio = $('#laboratorio').val();
    let proveedor = $('#proveedor').val();
    let fecha_vencimiento = $('#fecha_vencimiento').val();
    let inventario_inicial = $('#inventario_inicial').val();
    let unidad1 = $('#unidad1').val();
    let precio_compra_unidad1 = parseFloat($('#precio_compra_unidad1').val().trim());

    let isValid = true;

    $('#error-nombre').text('');
    $('#error-categoria').text('');
    $('#error-laboratorio').text('');
    $('#error-proveedor').text('');
    $('#error-fecha-vencimiento').text('');
    $('#error-inventario-inicial').text('');
    $('#error-unidad1').text('');
    $('#error-precio-compra-unidad1').text('');

    if (nombre === '') {
        $('#error-nombre').text('El campo nombre es obligatorio');
        isValid = false;
    }

    if (categoria === '') {
        $('#error-categoria').text('Debe seleccionar una categoría');
        isValid = false;
    }

    if (laboratorio === '') {
        $('#error-laboratorio').text('Debe seleccionar un laboratorio');
        isValid = false;
    }

    if (proveedor === '') {
        $('#error-proveedor').text('Debe seleccionar un proveedor');
        isValid = false;
    }

    if (fecha_vencimiento === '') {
        $('#error-fecha-vencimiento').text('Debe ingresar una fecha de vencimiento');
        isValid = false;
    }

    if (inventario_inicial === '' || isNaN(inventario_inicial) || inventario_inicial < 0) {
        $('#error-inventario-inicial').text('Debe ingresar un inventario inicial válido');
        isValid = false;
    }

    if (unidad1 === '' || isNaN(unidad1) || unidad1 <= 0) {
        $('#error-unidad1').text('Debe ingresar una unidad válida');
        isValid = false;
    }

    if (precio_compra_unidad1 === '' || isNaN(precio_compra_unidad1) || precio_compra_unidad1 <= 0) {
        $('#error-precio-compra-unidad1').text('Debe ingresar un precio de compra válido');
        isValid = false;
    }

    return isValid;
}












