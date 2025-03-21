$(document).ready(function () {
    HistorialCaja();
});

function HistorialCaja() {
    $.ajax({
        url: "/ListarHistorialCaja",
        type: "GET",
        success: function (response) {
            let template = "";

            $("#totalCaja").text(` ${response.total_caja.toFixed(2)}`);

            response.cajas.forEach((caja) => {
                template += `
                    <tr>
                       <td class="text-center">
                            <a href="/listarCierrecajaSeleccionada/${caja.c_ID_Cierre}" class="btn btn-light" data-id="${caja.c_ID_Cierre}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>

                        <td>S/. ${parseFloat(caja.c_Total_Final).toFixed(
                            2
                        )}</td>
                        <td>${caja.c_fechacierre}</td>
                        <td>${caja.usuario.c_nombre}</td>
                    </tr>
                `;
            });

            $("#body_caja").html(template);
        },
    });
}

$("#buscarCaja").click(function () {

    if (!validacion()) {
        return;
    }

    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    buscarHistorialFecha(fecha_inicio, fecha_fin);
});


function buscarHistorialFecha(fecha_inicio, fecha_fin) {
    $.ajax({
        url: "/ListarHistorialCajaPorFechas",
        type: "POST",
        data: { fecha_inicio, fecha_fin },
        success: function (response) {
            let template = "";

            $("#totalCaja").text(` ${response.total_caja.toFixed(2)}`);

            response.cajas.forEach((caja) => {
                template += `
                    <tr>
                     <td class="text-center">
                        <a href="/listarCierrecajaSeleccionada/${caja.c_ID_Cierre}" class="btn btn-light" data-id="${caja.c_ID_Cierre}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>


                        <td>S/. ${parseFloat(caja.c_Total_Final).toFixed(
                            2
                        )}</td>
                        <td>${caja.c_fechacierre}</td>
                        <td>${caja.usuario.c_nombre}</td>
                    </tr>
                `;
            });

            $("#body_caja").html(template);
        },
    });
}

function validacion() {
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    if (fecha_inicio == "") {
        alertaAdvertencia("Debe seleccionar una fecha de inicio");
        return false;
    }

    if (fecha_fin == "") {
        alertaAdvertencia("Debe seleccionar una fecha de fin");
        return false;
    }

    return true;
}
