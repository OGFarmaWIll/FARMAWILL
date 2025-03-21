$(document).ready(function () {
    listarClientes();

    $('#modalCliente').on('hidden.bs.modal', function () {
        $('#formCliente')[0].reset();
        $('#cliente_id').val('');
        limpiarErrores();
        $('#btnGuardar').removeClass('d-none');
        $('#btnActualizar').addClass('d-none');
    });
});



function listarClientes() {
    $.ajax({
        url: "ListarCliente",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if ($.fn.dataTable.isDataTable('#tablaClientes')) {
                $('#tablaClientes').DataTable().clear().destroy();
            }

            let template = response.map((cliente, index) => `
                <tr class="">
                    <td>${index + 1}</td>
                    <td>${cliente.c_iddni || ""}</td>
                    <td>${cliente.c_nombres || ''}</td>
                    <td>${cliente.c_direccion || ''}</td>
                    <td>${cliente.c_email || ''}</td>
                    <td>${cliente.c_telefono || ''}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${cliente.c_idcliente}">  
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${cliente.c_idcliente}"> 
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join("");

            $("#body_cliente").html(template);

            table = $('#tablaClientes').DataTable({
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
    editarCliente(id);
});

$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarCliente(id);
    });
});


$('#btnActualizar').on('click', function () {
    let id = $('#cliente_id').val();
    ActualizarCliente(id);
});



function editarCliente(id) {
    $.ajax({
        url: `/clientes/${id}`,
        type: "GET",
        success: function (response) {
            $('#nombre').val(response.c_nombres);
            $('#email').val(response.c_email);
            $('#dni').val(response.c_iddni);
            $('#telefono').val(response.c_telefono);
            $('#direccion').val(response.c_direccion);
            $('#cliente_id').val(response.c_idcliente);
            $('#btnGuardar').addClass('d-none');
            $('#btnActualizar').removeClass('d-none');
            $('#modalCliente').modal('show');
        },
        error: function (xhr) {
            console.error("Error al editar cliente:", xhr);
        }
    });
}

function ActualizarCliente(id) {
    let nombre = $('#nombre').val().trim();
    let email = $('#email').val().trim();
    let dni = $('#dni').val().trim();
    let telefono = $('#telefono').val().trim();
    let direccion = $('#direccion').val().trim();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario()) return;

    $.ajax({
        url: `/clientes/${id}`,
        type: "POST",
        data: {
            _token: csrfToken,
            _method: 'PUT',
            nombre: nombre,
            email: email,
            dni: dni,
            telefono: telefono,
            direccion: direccion
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalCliente').modal('hide');
            listarClientes();
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
                console.error("Error al actualizar cliente:", xhr);
            }
        }
    });
}

function eliminarCliente(id) {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/clientes/${id}`,
        type: "DELETE",
        data: {
            _token: csrfToken
        },
        success: function (response) {
            listarClientes();
        },
        error: function (xhr) {
            console.error("Error al eliminar cliente:", xhr);
        }
    });
}

