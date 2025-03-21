function limpiarErrores_doctor() {
    $('#errorNombre_doctor').text('');
    $('#errorEspecialidad').text('');
    $('#errorEmail_doctor').text('');
}


$('#btnGuardar_doctor').on('click', function () {
    CrearDoctor();
});


function CrearDoctor() {
    let nombre = $('#nombre_doctor').val().trim();
    let codigoMedico = $('#codigoMedico').val().trim();
    let especialidad = $('#especialidad').val().trim();
    let email = $('#email_doctor').val().trim();
    let direccion = $('#direccion_doctor').val().trim();
    let telefono = $('#telefono_doctor').val().trim();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario_doctor()) return;
    

    $('#btnGuardar_doctor').prop('disabled', true).text('Guardando...');

    $.ajax({
        url: "/doctores",
        type: "POST",
        data: {
            _token: csrfToken,
            nombre: nombre,
            codigoMedico: codigoMedico,
            especialidad: especialidad,
            email: email,
            direccion: direccion,
            telefono: telefono
        },
        success: function (response) {
            alertaExito(response.mensaje);
            listarDoctores();
            $('#modalDoctor').modal('hide');
            $('.modal-backdrop').remove();
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.nombre) {
                    $('#errorNombre_doctor').text(errors.nombre[0]);
                }
                if (errors.especialidad) {
                    $('#errorEspecialidad').text(errors.especialidad[0]);
                }
                if (errors.email) {
                    $('#errorEmail_doctor').text(errors.email[0]);
                }
            } else {
                console.error("Error al crear doctor:", xhr);
            }
        },
        complete: function () {    
            $('#btnGuardar_doctor').prop('disabled', false).text('Guardar');
        }

    });
}


function validarFormulario_doctor() {
    let isValid = true;
    let nombre = $('#nombre_doctor').val().trim();
    let especialidad = $('#especialidad').val().trim();
    let email = $('#email_doctor').val().trim();

    limpiarErrores_doctor();

    if (!nombre) {
        $('#errorNombre_doctor').text('El nombre es requerido');
        isValid = false;
    }

    if (!especialidad) {
        $('#errorEspecialidad').text('La especialidad es requerida');
        isValid = false;
    }

    if (email && !validarEmail(email)) {
        $('#errorEmail_doctor').text('El formato del email no es válido');
        isValid = false;
    }

    return isValid;
}

function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}




$('#modalDoctor').on('hidden.bs.modal', function () {
    $('#nombre_doctor').val('');
    $('#codigoMedico').val('');
    $('#especialidad').val('');
    $('#email_doctor').val('');
    $('#direccion_doctor').val('');
    $('#telefono_doctor').val('');
    limpiarErrores_doctor();
});





