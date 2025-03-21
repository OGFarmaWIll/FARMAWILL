$(document).ready(function () {
    listarDoctores();

    $('#modalDoctor').on('hidden.bs.modal', function () {
        $('#formDoctor')[0].reset();
        $('#doctor_id').val('');
        limpiarErrores_doctor();
        $('#btnGuardar_doctor').removeClass('d-none');
        $('#btnActualizar').addClass('d-none');
    });
});



function listarDoctores() {
    $.ajax({
        url: "ListarDoctor",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if ($.fn.dataTable.isDataTable('#tablaDoctores')) {
                $('#tablaDoctores').DataTable().clear().destroy();
            }

            let template = response.map((doctor, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td>${doctor.c_cmp || ''}</td>
                    <td>${doctor.c_nombres}</td>
                    <td>${doctor.c_especialidad}</td>
                    <td>${doctor.c_direccion || ''}</td>
                    <td>${doctor.c_email || ''}</td>
                    <td>${doctor.c_telefono || ''}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${doctor.c_iddoctor}">  
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${doctor.c_iddoctor}"> 
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join("");

            $("#body_doctor").html(template);

            table = $('#tablaDoctores').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                },
                dom: 'Blrtip',
            });

            $('#search').on('keyup', function () {
                table.search($(this).val()).draw();
            });
        }
    });
}

$(document).on('click', '.btn-editar', function () {
    let id = $(this).data('id');
    editarDoctor(id);
});

$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarDoctor(id);
    });
});



$('#btnActualizar').on('click', function () {
    let id = $('#doctor_id').val();
    ActualizarDoctor(id);
});



function editarDoctor(id) {
    $.ajax({
        url: `/doctores/${id}`,
        type: "GET",
        success: function (response) {
            $('#nombre_doctor').val(response.c_nombres);
            $('#codigoMedico').val(response.c_cmp);
            $('#especialidad').val(response.c_especialidad);
            $('#email_doctor').val(response.c_email);
            $('#direccion_doctor').val(response.c_direccion);
            $('#telefono_doctor').val(response.c_telefono);
            $('#doctor_id').val(response.c_iddoctor);
            $('#btnGuardar_doctor').addClass('d-none');
            $('#btnActualizar').removeClass('d-none');
            $('#modalDoctor').modal('show');
        },
        error: function (xhr) {
            console.error("Error al editar doctor:", xhr);
        }
    });
}

function ActualizarDoctor(id) {
    let nombre = $('#nombre_doctor').val().trim();
    let codigoMedico = $('#codigoMedico').val().trim();
    let especialidad = $('#especialidad').val().trim();
    let email = $('#email_doctor').val().trim();
    let direccion = $('#direccion_doctor').val().trim();
    let telefono = $('#telefono_doctor').val().trim();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario_doctor()) return;

    $.ajax({
        url: `/doctores/${id}`,
        type: "POST",
        data: {
            _token: csrfToken,
            _method: 'PUT',
            nombre: nombre,
            codigoMedico: codigoMedico,
            especialidad: especialidad,
            email: email,
            direccion: direccion,
            telefono: telefono
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalDoctor').modal('hide');
            listarDoctores();
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
                console.error("Error al actualizar doctor:", xhr);
            }
        }
    });
}

function eliminarDoctor(id) {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/doctores/${id}`,
        type: "DELETE",
        data: {
            _token: csrfToken
        },
        success: function (response) {
            listarDoctores();
        },
        error: function (xhr) {
            console.error("Error al eliminar doctor:", xhr);
        }
    });
}


