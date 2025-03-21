
$(document).ready(function() {
    obtenerDatosProducto();
});


function listarSelect(presentaciones = []) {
    $.ajax({
        url: "/UnidadMedida",
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log("Unidades de medida:", response);

            const select1 = $("#unidad1");
            const select2 = $("#unidad2");
            const select3 = $("#unidad3");

            [select1, select2, select3].forEach(select => {
                select.empty().append('<option value="">Seleccione...</option>');
            });

            const selectedIds = [
                presentaciones[0]?.c_idunidadmedida || null,
                presentaciones[1]?.c_idunidadmedida || null,
                presentaciones[2]?.c_idunidadmedida || null
            ];

            const opcionesPermitidas = {
                select1: ["UNIDAD", "AMPOLLA", "BLISTER", "CAJA", "CAPSULA", "COMPRIMIDO", "FRASCO", "LATA", "PACK", "PAQUETE", "POTE", "SACHET", "SOBRE", "TABLETA", "TUBO"],
                select2: ["BLISTER", "CAJA", "PACK", "SOBRE"],
                select3: ["CAJA", "PACK"]
            };

            poblarSelect(select1, opcionesPermitidas.select1, selectedIds[0], response);
            poblarSelect(select2, opcionesPermitidas.select2, selectedIds[1], response);
            poblarSelect(select3, opcionesPermitidas.select3, selectedIds[2], response);
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener unidades:", error);
        }
    });
}

function poblarSelect(select, opcionesPermitidas, selectedId, unidades) {
    unidades.forEach(unidad => {
        const descripcion = unidad.c_desc.toUpperCase();
        if (opcionesPermitidas.includes(descripcion)) {
            const selected = unidad.c_idunidadmedida === selectedId ? "selected" : "";
            select.append(`<option value="${unidad.c_idunidadmedida}" ${selected}>${unidad.c_desc}</option>`);
        }
    });
}


function obtenerDatosProducto() {
    let id = $('#idProducto').val();

    $.ajax({
        url: `/productos/${id}`,
        type: "GET",
        dataType: "json",
        success: function(response) {
            console.log(response.producto);

            let producto = response.producto;
            let presentaciones = producto.presentaciones; 
            
            let laboratorios = producto.c_idlaboratorio;
            let proveedores = producto.c_idproveedor;
            let categorias = producto.c_idcategoria;

            listarCategoria(categorias);
            listarProveedor(proveedores);
            listarLaboratorio(laboratorios);


            listarSelect(presentaciones);
            
        },
        error: function(xhr, status, error) {
            console.error("Error al obtener los datos:", error);
        }
    });
}




$('#actualizarProducto').click(function(){

    if (!validacion()) {
        return;
    }
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    let formData = new FormData();
    formData.append("_token", csrfToken);
    
    if($("#imagen").prop("files")[0] != undefined){
        formData.append("imagen", $("#imagen").prop("files")[0]);
    }

    formData.append('_method', 'PUT');
    formData.append("codigo_barras", $("#codigo_barras").val());
    formData.append("nombre", $("#nombre").val());
    formData.append("categoria", $("#categoria").val());
    formData.append("laboratorio", $("#laboratorio").val());
    formData.append("proveedor", $("#proveedor").val());
    formData.append("principio_activo", $("#principio_activo").val());
    formData.append("presentacion", $("#presentacion").val());
    formData.append("registro_sanitario", $("#registro_sanitario").val());
    formData.append("ubicacion", $("#ubicacion").val());
    formData.append("lote", $("#lote").val());
    formData.append("fecha_vencimiento", $("#fecha_vencimiento").val());
    formData.append("minimo_inventario", $("#minimo_inventario").val());
    formData.append("inventario_inicial", $("#inventario_inicial").val());

    
    formData.append("idPresentacion_1", $('#idPresentacion_1').val());
    formData.append("unidad1", $('#unidad1').val());
    formData.append("precio_compra_unidad1", $('#precio_compra_unidad1').val());
    formData.append("ganancia_unidad1", $('#ganancia_unidad1').val());
    formData.append("precio_unidad1", $('#precio_unidad1').val());
    formData.append("comision_unidad1", $('#comision_unidad1').val());

    formData.append("idPresentacion_2", $('#idPresentacion_2').val());
    formData.append("unidad2", $('#unidad2').val());
    formData.append("cantidad_unidad2", $('#cantidad_unidad2').val());
    formData.append("precio_unidad2", $('#precio_unidad2').val());
    formData.append("comision_unidad2", $('#comision_unidad2').val());

    formData.append("idPresentacion_3", $('#idPresentacion_3').val());
    formData.append("unidad3", $('#unidad3').val());
    formData.append("cantidad_unidad3", $('#cantidad_unidad3').val());
    formData.append("precio_unidad3", $('#precio_unidad3').val());
    formData.append("comision_unidad3", $('#comision_unidad3').val());


    let id = $('#idProducto').val();

    $.ajax({
        url: `/productos/${id}`,
        type: "POST",
        data: formData,
        contentType: false, 
        processData: false, 
        success: function (response) {
            alertaExito(response.mensaje);
            window.history.back();



        },
        error: function (xhr) {
            console.error("Error al agregar el producto:", xhr);
        }
    });

});





function listarCategoria(selectedValue) {
    $.ajax({
        url: "/ListarCategoria",
        type: "GET",
        dataType: "json",
        success: function(response) {
            let template = `<option value="0">Seleccione una categoría</option>`;

            template += response.map((categoria) => `
                <option value="${categoria.c_idcategoria}" ${categoria.c_idcategoria == selectedValue ? 'selected' : ''}>
                    ${categoria.c_desc}
                </option>
            `).join("");

            $("#categoria").html(template);
        }
    });
}

function listarProveedor(selectedValue) {
    $.ajax({
        url: "/ListarProveedores",
        type: "GET",
        dataType: "json",
        success: function(response) {
            let template = `<option value="0">Seleccione un proveedor</option>`;

            template += response.map((proveedor) => `
                <option value="${proveedor.c_idproveedor}" ${proveedor.c_idproveedor == selectedValue ? 'selected' : ''}>
                    ${proveedor.c_desc}
                </option>
            `).join("");

            $("#proveedor").html(template);
        }
    });
}

function listarLaboratorio(selectedValue) {
    $.ajax({
        url: "/ListarLaboratorio",
        type: "GET",
        dataType: "json",
        success: function(response) {
            let template = `<option value="0">Seleccione un laboratorio</option>`;

            template += response.map((laboratorio) => `
                <option value="${laboratorio.c_idlaboratorio}" ${laboratorio.c_idlaboratorio == selectedValue ? 'selected' : ''}>
                    ${laboratorio.c_desc}
                </option>
            `).join("");

            $("#laboratorio").html(template);
        }
    });
}