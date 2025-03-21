
$(document).ready(function() {
    ListarProductos();
});


function ListarProductos() {
    $.ajax({
        url: '/ListarProductos',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if ($.fn.dataTable.isDataTable('#tablaProducto')) {
                $('#tablaProducto').DataTable().clear().destroy();
            }

            $('#totalProductos').text(response.totalProductos);
            $('#producto_porVencer').text(response.cantidadPorVencer);
            $('#producto_vencidos').text(response.cantidadVencidos);
            $('#producto_pocoStock').text(response.cantidadPocoStock);

            let filas = response.productos.map(producto => {
                let stock = producto.c_inventarioini;
                let colorfila = ""; 

                if (stock <= 5) {
                    colorfila = "red";
                } else if (stock > 5 && stock <= 15) {
                    colorfila = "#f1f1a2";
                }

                let presentacion = producto.presentaciones?.[0] || {};
                
                return `
                <tr style="background-color: ${colorfila} !important">

                    <td class="d-flex">
                        <button class="btn btn-info btn-sm btn-editar" data-id="${producto.c_idproducto}">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm btn-eliminar" data-id="${producto.c_idproducto}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <td>${producto.c_nombre}</td>
                    <td>${producto.c_presentacion || ""}</td>
                    <td>${presentacion.unidad_medida?.c_desc || ''}</td>
                    <td>${producto.categoria?.c_desc || ''}</td>
                    <td>${producto.laboratorio?.c_desc || ''}</td>
                    <td>${producto.proveedor?.c_desc || ''}</td>
                    <td>${presentacion.c_preciocompra || '0.00'}</td>
                    <td>${presentacion.c_preciounidad || '0.00'}</td>
                    <td>${presentacion.c_gananciaunidad || '0'}%</td>
                    <td>${producto.c_lote || ''}</td>
                    <td>${producto.c_fechavenc?.split(' ')[0] || ''}</td>
                    <td>${stock}</td>
                </tr>`;
            }).join('');

            $('#body_proveedor').html(filas);

            let table = $('#tablaProducto').DataTable({
                language: { url: 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json' },
                dom: 'Blrtip'
            });

            $('#search').on('keyup', function () {
                table.search($(this).val()).draw();
            });
        },
        error: function(xhr, status, error) {
            console.error("Error al obtener los productos:", error);
        }
    });
}




$(document).on("click", ".btn-editar", function () {
    let id = $(this).data("id");
    window.location.href = `/productos/${id}/edit`;
});



$(document).on('click', '.btn-eliminar', function () {
    let id = $(this).data('id');
    alertaEliminar(() => {
        eliminarProducto(id);
    });
});



function eliminarProducto(id) {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/productos/${id}`,
        type: "DELETE",
        data: {
            _token: csrfToken
        },
        success: function (response) {
            ListarProductos();
        },
        error: function (xhr) {
            console.error("Error al eliminar laboratorio:", xhr);
        }
    });
}














