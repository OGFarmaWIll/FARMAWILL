$('#btnGuardar').on('click', function () {
    CrearCliente();
});


function CrearCliente() {
    let nombre = $('#nombre').val().trim();
    let email = $('#email').val().trim();
    let dni = $('#dni').val().trim();
    let telefono = $('#telefono').val().trim();
    let direccion = $('#direccion').val().trim();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario()) return;

    $('#btnGuardar').prop('disabled', true).text('Guardando...');

    $.ajax({
        url: "/clientes",
        type: "POST",
        data: {
            _token: csrfToken,
            nombre: nombre,
            email: email,
            dni: dni,
            telefono: telefono,
            direccion: direccion
        },
        success: function (response) {
            alertaExito(response.mensaje);
            listarClientes();
            $('#modalCliente').modal('hide');
            $('.modal-backdrop').remove();
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.nombre) {
                    $('#errorNombre_cliente').text(errors.nombre[0]);
                }
                if (errors.email) {
                    $('#errorEmail').text(errors.email[0]);
                }
            } else {
                console.error("Error al crear cliente:", xhr);
            }
        },
        complete: function () {
           
            $('#btnGuardar').prop('disabled', false).text('Guardar');
        }

    });
}

function validarFormulario() {
    let isValid = true;
    let nombrecliente = $('#nombre').val().trim();
    let email = $('#email').val().trim();

    limpiarErrores();

    if (!nombrecliente) {
        $('#errorNombre_cliente').text('El nombre es requerido');
        isValid = false;
    }

    if (email && !validarEmail(email)) {
        $('#errorEmail').text('El formato del email no es válido');
        isValid = false;
    }

    return isValid;
}

function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}


function limpiarErrores() {
    $('#errorNombre_cliente').text('');
    $('#errorEmail').text('');
   
}


$('#modalCliente').on('hidden.bs.modal', function () {  

    $('#nombre').val('');
    $('#email').val('');
    $('#dni').val('');
    $('#telefono').val('');
    $('#direccion').val('');
    limpiarErrores();


});

