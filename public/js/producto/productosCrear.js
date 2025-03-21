

$(document).ready(function() {
    listarCategoria();
    listarProveedor();
    listarLaboratorio();
    listarSelects();
});


$('#agregarProducto').click(function() {
    if (!validacion()) {
        return;
    }
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    let formData = new FormData();
    formData.append("_token", csrfToken);
    
    if($("#imagen").prop("files")[0] != undefined){
        formData.append("imagen", $("#imagen").prop("files")[0]);
    }

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

    formData.append("unidad1", $('#unidad1').val());
    formData.append("precio_compra_unidad1", $('#precio_compra_unidad1').val());
    formData.append("ganancia_unidad1", $('#ganancia_unidad1').val());
    formData.append("precio_unidad1", $('#precio_unidad1').val());
    formData.append("comision_unidad1", $('#comision_unidad1').val());
    formData.append("unidad2", $('#unidad2').val());
    formData.append("cantidad_unidad2", $('#cantidad_unidad2').val());
    formData.append("precio_unidad2", $('#precio_unidad2').val());
    formData.append("comision_unidad2", $('#comision_unidad2').val());
    formData.append("unidad3", $('#unidad3').val());
    formData.append("cantidad_unidad3", $('#cantidad_unidad3').val());
    formData.append("precio_unidad3", $('#precio_unidad3').val());
    formData.append("comision_unidad3", $('#comision_unidad3').val());



    $.ajax({
        url: "/productos",
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


function listarSelects() {
    $.ajax({
        url: "/UnidadMedida",  
        type: "GET",
        dataType: "json",
        success: function(response) {
            console.log("Lista de unidades: ", response);

            let select1 = $("#unidad1");
            let select2 = $("#unidad2");
            let select3 = $("#unidad3");

            select1.empty();
            select2.empty();
            select3.empty();

            select1.append('<option value="">Seleccione...</option>');
            select2.append('<option value="">Seleccione...</option>');
            select3.append('<option value="">Seleccione...</option>');

            let opcionesSelect1 = ["UNIDAD", "AMPOLLA", "BLISTER", "CAJA", "CAPSULA", "COMPRIMIDO", "FRASCO", "LATA", "PACK", "PAQUETE", "POTE", "SACHET", "SOBRE", "TABLETA", "TUBO"];
            let opcionesSelect2 = ["BLISTER", "CAJA", "PACK", "SOBRE"];
            let opcionesSelect3 = ["CAJA", "PACK"];

            function agregarOpciones(select, opcionesPermitidas) {
                response.forEach(function(item) {
                    if (opcionesPermitidas.includes(item.c_desc)) { 
                        select.append(`<option value="${item.c_idunidadmedida}">${item.c_desc}</option>`);
                    }
                });
            }

            agregarOpciones(select1, opcionesSelect1);
            agregarOpciones(select2, opcionesSelect2);
            agregarOpciones(select3, opcionesSelect3);
        },
        error: function(xhr, status, error) {
            console.error("Error al obtener los datos:", error);
        }
    });
}







function listarCategoria(){
    $.ajax({
        url: "/ListarCategoria",
        type: "GET",
        dataType: "json",
        success: function (response) {
            //  console.log(response);
             let template = `<option value="0" > Seleccione una categoría </option>`;

             template = response.map((categoria, index) => `
            <option value="${categoria.c_idcategoria}" > ${categoria.c_desc} </option>

        `).join("");

        $("#categoria").html(template);

        }
    });
}



function listarProveedor(){
    $.ajax({
        url: "/ListarProveedores",
        type: "GET",
        dataType: "json",
        success: function (response) {
            //  console.log(response);
             let template = `<option value="0" > Seleccione una categoría </option>`;

             template = response.map((proveedor, index) => `
            <option value="${proveedor.c_idproveedor}" > ${proveedor.c_desc} </option>

        `).join("");

        $("#proveedor").html(template);

        }
    });
}


function listarLaboratorio(){
    
    $.ajax({
        url: "/ListarLaboratorio",
        type: "GET",
        dataType: "json",
        success: function (response) {
            //  console.log(response);
             let template = `<option value="0" > Seleccione una categoría </option>`;

             template = response.map((laboratorio, index) => `
            <option value="${laboratorio.c_idlaboratorio}" > ${laboratorio.c_desc} </option>

        `).join("");

        $("#laboratorio").html(template);

        }
    });
}











