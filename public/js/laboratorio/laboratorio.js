$(document).ready(function () {
    listarLaboratorios();

    $('#modalLaboratorio').on('hidden.bs.modal', function () {
        $('#formLaboratorio')[0].reset();
        $('#laboratorio_id').val('');
        $('#errorNombre').text('');
        $('#errorTipo').text('');
        $('#btnGuardar').removeClass('d-none');
        $('#btnActualizar').addClass('d-none');
    });
});

function listarLaboratorios() {
    $.ajax({
        url: "ListarLaboratorio",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if ($.fn.dataTable.isDataTable('#tablaLaboratorios')) {
                $('#tablaLaboratorios').DataTable().clear().destroy();
            }

            let template = response.map((laboratorio, index) => `
                <tr class="">
                    <td>${index + 1}</td>
                    <td>${laboratorio.c_desc}</td>
                    <td>${laboratorio.c_tipo}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${laboratorio.c_idlaboratorio}">  
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${laboratorio.c_idlaboratorio}"> 
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join("");

            $("#body_laboratorio").html(template);

            table = $('#tablaLaboratorios').DataTable({
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
    editarLaboratorio(id);
});

$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarLaboratorio(id);
    });
});

$('#btnGuardar').on('click', function () {
    CrearLaboratorio();
});

$('#btnActualizar').on('click', function () {
    let id = $('#laboratorio_id').val();
    ActualizarLaboratorio(id);
});

function CrearLaboratorio() {
    let nombre = $('#nombre').val().trim();
    let tipo = $('#tipo').val();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario()) return;

    $.ajax({
        url: "/laboratorios",
        type: "POST",
        data: {
            _token: csrfToken,
            nombre: nombre,
            tipo: tipo
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalLaboratorio').modal('hide');
            $('.modal-backdrop').remove();

            listarLaboratorios();
        },
        error: function (xhr) {
            console.error("Error al crear laboratorio:", xhr);
        }
    });
}

function editarLaboratorio(id) {
    $.ajax({
        url: `/laboratorios/${id}`,
        type: "GET",
        success: function (response) {
            $('#nombre').val(response.c_desc);
            $('#tipo').val(response.c_tipo);
            $('#laboratorio_id').val(response.c_idlaboratorio);
            $('#btnGuardar').addClass('d-none');
            $('#btnActualizar').removeClass('d-none');
            $('#modalLaboratorio').modal('show');
        },
        error: function (xhr) {
            console.error("Error al editar laboratorio:", xhr);
        }
    });
}

function ActualizarLaboratorio(id) {
    let nombre = $('#nombre').val().trim();
    let tipo = $('#tipo').val();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario()) return;

    $.ajax({
        url: `/laboratorios/${id}`,
        type: "POST",
        data: {
            _token: csrfToken,
            _method: 'PUT',
            nombre: nombre,
            tipo: tipo
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalLaboratorio').modal('hide');
            $('.modal-backdrop').remove();

            listarLaboratorios();
        },
        error: function (xhr) {
            console.error("Error al actualizar laboratorio:", xhr);
        }
    });
}

function eliminarLaboratorio(id) {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/laboratorios/${id}`,
        type: "DELETE",
        data: {
            _token: csrfToken
        },
        success: function (response) {

            listarLaboratorios();
        },
        error: function (xhr) {
            console.error("Error al eliminar laboratorio:", xhr);
        }
    });
}

function validarFormulario() {
    let isValid = true;
    let nombre = $('#nombre').val().trim();
    let tipo = $('#tipo').val();

    $('#errorNombre').text('');
    $('#errorTipo').text('');

    if (!nombre) {
        $('#errorNombre').text('El nombre es requerido');
        isValid = false;
    }

    if (!tipo) {
        $('#errorTipo').text('El tipo es requerido');
        isValid = false;
    }

    return isValid;
}
