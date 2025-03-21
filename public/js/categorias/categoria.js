

$(document).ready(function () {
    listarCategorias();

    $('#modalCategoria').on('hidden.bs.modal', function () {
        $('#formCategoria')[0].reset();
        $('#categoria_id').val('');
        $('#errorNombre').text('');
        $('#errorTipo').text('');
        $('#btnGuardar').removeClass('d-none');
        $('#btnActualizar').addClass('d-none');
    });

})


function listarCategorias() {
    $.ajax({
        url: "ListarCategoria",
        type: "GET",
        dataType: "json",
        success: function (response) {


            if ($.fn.dataTable.isDataTable('#tablaCategorias')) {
                $('#tablaCategorias').DataTable().clear().destroy();
            }

            let template = response.map((categoria, index) => `
                <tr class="">
                    <td>${index + 1}</td>
                    <td>${categoria.c_desc}</td>
                    <td>${categoria.c_tipo}</td>
                    <td>
                        <button class="btn btn-sm btn-primary btn-editar" data-id="${categoria.c_idcategoria}">  
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-eliminar" data-id="${categoria.c_idcategoria}"> 
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `).join("");

            $("#body_categoria").html(template);

            table = $('#tablaCategorias').DataTable({
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
    editarCategoria(id);
});

$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarCategoria(id);
    });
});


$('#btnGuardar').on('click', function () {
    CrearCategoria();
});

$('#btnActualizar').on('click', function () {
    let id = $('#categoria_id').val();
    ActualizarCategoria(id);
});

function CrearCategoria() {
    let nombre = $('#nombre').val().trim();
    let tipo = $('#tipo').val();
    let csrfToken = $('meta[name="csrf-token"]').attr('content'); 

    if (!validarFormulario()) return;

    $.ajax({
        url: "/categorias",
        type: "POST",
        data: {
            _token: csrfToken,
            nombre: nombre,
            tipo: tipo
        },
        dataType: "json",
        success: function (response) {
            let mensaje = response.mensaje;
            alertaExito(mensaje);
            $('#modalCategoria').modal('hide');
            $('.modal-backdrop').remove();
            listarCategorias();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function editarCategoria(id){
 $.ajax({
     url: "/categorias/" + id,
     type: "GET",
     dataType: "json",
     success: function (response) {
        $('#nombre').val(response.c_desc);
        $('#tipo').val(response.c_tipo);
        $('#categoria_id').val(id);
        $('#btnGuardar').addClass('d-none');
        $('#btnActualizar').removeClass('d-none');
        $('#modalCategoria').modal('show');
     },
     error: function (error) {
         console.log(error);
     }
 })

}

function ActualizarCategoria(id) {
    let nombre = $('#nombre').val().trim();
    let tipo = $('#tipo').val();
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!validarFormulario()) return;

    $.ajax({
        url: "/categorias/" + id,
        type: "PUT",
        data: {
            _token: csrfToken,
            nombre: nombre,
            tipo: tipo
        },
        dataType: "json",
        success: function (response) {
           
            alertaExito(response.mensaje);
            $('#modalCategoria').modal('hide');
            $('.modal-backdrop').remove();
            listarCategorias();
        },
        error: function (error) {
            console.log(error);
        }
    });  

}

function eliminarCategoria(id){
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/categorias/" + id,
        type: "DELETE",
        data: {
            _token: csrfToken
        },
        dataType: "json",
        success: function (response) {
            listarCategorias();
        },
        error: function (error) {
            console.log(error);
        }
    });
}


function validarFormulario() {
    let nombre = $('#nombre').val().trim();
    let tipo = $('#tipo').val();

    $("#errorNombre").text("");
    $("#errorTipo").text("");

    let valido = true;

    if (nombre === '') {
        $('#errorNombre').text('El nombre es obligatorio');
        valido = false;
    }

    if (!tipo) {
        $('#errorTipo').text('El tipo es obligatorio');
        valido = false;
    }

    return valido;
}









