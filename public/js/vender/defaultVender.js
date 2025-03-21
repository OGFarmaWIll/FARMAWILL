
$(document).ready(function() {
    listarClientes();
    listarDoctores();
    tipoPago();
    tipoDocumento();
});


function listarClientes(){
    $.ajax({
        url: '/ListarCliente',
        type: 'GET',
        success: function(response){
            console.log(response);
            let html = '';
            response.forEach(cliente => {
                html += `<option value="${cliente.c_idcliente}">${cliente.c_nombres}</option>`;
            });
            $('#clienteVender').html(html);
        }
    });
}

function listarDoctores(){
    $.ajax({
        url: '/ListarDoctor',
        type: 'GET',
        success: function(response){
            console.log(response);
            let html = '';
            response.forEach(doctor => {
                html += `<option value="${doctor.c_iddoctor}">${doctor.c_nombres}</option>`;
            });
            $('#doctorVender').html(html);
        }
    });
}


function tipoPago(){
    $.ajax({
        url: '/listarTipoPago',
        type: 'GET',
        success: function(response){
            console.log(response);
            let html = '';
            response.forEach(tipoPago => {
                html += `<option value="${tipoPago.c_tipopago}">${tipoPago.c_desc}</option>`;
            });
            $('#formaPago').html(html);
        }
    });
}

function tipoDocumento(){
    $.ajax({
        url: '/listarTipoDocumento',
        type: 'GET',
        success: function(response){
            console.log(response);
            let html = '';
            response.forEach(tipoDocumento => {
                html += `<option value="${tipoDocumento.c_tipodoc}">${tipoDocumento.c_desc}</option>`;
            });
            $('#tipo_documento').html(html);
        }
    });
}



$('#formaPago').change(function () {
    let pago = parseInt($(this).val()); 

    $('.pago-efectivo, .pago-tarjeta, .pago-mixto').addClass('d-none');

    if (pago === 1) {
        $('.pago-efectivo').removeClass('d-none');
    } else if (pago === 3) { 
        $('.pago-tarjeta').removeClass('d-none');
    } else if (pago === 6) { 
        $('.pago-mixto').removeClass('d-none');
    }
});



$('#btn_cliente').click(function(){
    $('#modalCliente').modal('show');
});

$('#btn_doctor').click(function(){
    $('#modalDoctor').modal('show');    
} );



