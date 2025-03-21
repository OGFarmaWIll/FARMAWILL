$(document).ready(function () {
    listarInventario();
});

function listarInventario() {
    $.ajax({
        url: "/listarInventario",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if ($.fn.dataTable.isDataTable('#tabla_inventario')) {
                $('#tabla_inventario').DataTable().clear().destroy();
            }

            let template = "";

            response.productos.forEach((inventario, index) => {
                template += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${inventario.c_nombre}</td>
                        <td>${inventario.laboratorio.c_desc}</td>
                        <td>${inventario.c_lote || ""}</td>
                        <td>${inventario.c_fechavenc || ""}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>${inventario.c_inventarioini}</td>
                        <td><button class="btn btn-success btn-sm">Historial</button></td>
                    </tr>
                `;
            });

            $('#tbody_inventario').html(template);

          
            $('#tabla_inventario').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json'
                },
                dom: 'Blrtip',
            });
        },
        error: function () {
            alert("Error al cargar el inventario.");
        }
    });
}
