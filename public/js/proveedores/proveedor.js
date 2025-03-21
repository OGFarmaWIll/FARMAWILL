$(document).ready(function () {
    listarProveedores();

    $('#modalProveedor').on('hidden.bs.modal', function () {
        $('#formProveedor')[0].reset();
        $('#proveedor_id').val('');
        $('#errorRuc').text('');
        $('#errorNombre').text('');
        $('#errorDireccion').text('');
        $('#errorEmail').text('');
        $('#errorTelefono').text('');
        $('#btnGuardar').removeClass('d-none');
        $('#btnActualizar').addClass('d-none');
    });
});

function listarProveedores() {
    $.ajax({
        url: "ListarProveedores",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if ($.fn.dataTable.isDataTable('#tablaProveedores')) {
                $('#tablaProveedores').DataTable().clear().destroy();
            }

            let template = response.map((proveedor, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td>${proveedor.c_ruc || ''}</td>
                    <td>${proveedor.c_desc}</td>
                    <td>${proveedor.c_direccion || ''}</td>
                    <td>${proveedor.c_email || ''}</td>
                    <td>${proveedor.c_telefono || ''}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${proveedor.c_idproveedor}">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${proveedor.c_idproveedor}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join("");

            $("#body_proveedor").html(template);

            table = $('#tablaProveedores').DataTable({
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
    editarProveedor(id);
});

$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarProveedor(id);
    });
});

$('#btnGuardar').click(function () {
    if (validarFormulario()) {
        CrearProveedor();
    }
});

$('#btnActualizar').click(function () {
    if (validarFormulario()) {
        ActualizarProveedor($('#proveedor_id').val());
    }
});

function CrearProveedor() {
    $.ajax({
        url: "proveedores",
        type: "POST",
        data: {
            ruc: $('#ruc').val(),
            nombre: $('#nombre').val(),
            direccion: $('#direccion').val(),
            email: $('#email').val(),
            telefono: $('#telefono').val(),
            // _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalProveedor').modal('hide');
            $('.modal-backdrop').remove();

            listarProveedores();

        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.nombre) {
                    $('#errorNombre').text(errors.nombre[0]);
                }
                if (errors.email) {
                    $('#errorEmail').text(errors.email[0]);
                }
            }
        }
    });
}

function editarProveedor(id) {
    $.ajax({
        url: `proveedores/${id}`,
        type: "GET",
        success: function (response) {
            $('#proveedor_id').val(response.c_idproveedor);
            $('#ruc').val(response.c_ruc);
            $('#nombre').val(response.c_desc);
            $('#direccion').val(response.c_direccion);
            $('#email').val(response.c_email);
            $('#telefono').val(response.c_telefono);
            $('#btnGuardar').addClass('d-none');
            $('#btnActualizar').removeClass('d-none');
            $('#modalProveedor').modal('show');
        }
    });
}

function ActualizarProveedor(id) {
    $.ajax({
        url: `proveedores/${id}`,
        type: "PUT",
        data: {
            ruc: $('#ruc').val(),
            nombre: $('#nombre').val(),
            direccion: $('#direccion').val(),
            email: $('#email').val(),
            telefono: $('#telefono').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalProveedor').modal('hide');
            $('.modal-backdrop').remove();

            listarProveedores();

        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                if (errors.nombre) {
                    $('#errorNombre').text(errors.nombre[0]);
                }
                if (errors.email) {
                    $('#errorEmail').text(errors.email[0]);
                }
            }
        }
    });
}

function eliminarProveedor(id) {

    $.ajax({
        url: `proveedores/${id}`,
        type: "DELETE",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            listarProveedores();
            
        }
    });

}

function validarFormulario() {
    let isValid = true;
    $('#errorRuc').text('');
    $('#errorNombre').text('');
    $('#errorDireccion').text('');
    $('#errorEmail').text('');
    $('#errorTelefono').text('');

    if (!$('#nombre').val()) {
        $('#errorNombre').text('El nombre es requerido');
        isValid = false;
    }

    if ($('#email').val()) {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test($('#email').val())) {
            $('#errorEmail').text('El email no es válido');
            isValid = false;
        }
    }

    return isValid;
}
