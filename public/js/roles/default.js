$(document).ready(function () {
    listarPermisos();
    listarRoles();
    listarUsuarios();
});

function listarPermisos() {
    $.ajax({
        url: '/listarPermisos', 
        type: 'GET',
        success: function (response) {
            let permisosContainer = $("#permisosContainer");
            permisosContainer.empty();

            let permisosPorCategoria = agruparPermisosPorCategoria(response);
             
            for (let categoria in permisosPorCategoria) {
                let section = `
                    <div class="col-md-6">
                        <h6 class="mb-2">${categoria}</h6>
                        <div class="ms-3">
                `;

                permisosPorCategoria[categoria].forEach(permiso => {
                    section += `
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="permisos[]" value="${permiso.c_idpermiso}">
                            ${permiso.c_nombre}
                        </label>
                    `;
                });

                section += `</div></div>`; 
                permisosContainer.append(section);
            }
        },
        error: function (error) {
            console.error("Error al obtener los permisos:", error);
        }
    });
}


function agruparPermisosPorCategoria(permisos) {
    let permisosPorCategoria = {};

    permisos.forEach(({ c_categoria, c_idpermiso, c_nombre }) => {
        if (!permisosPorCategoria[c_categoria]) {
            permisosPorCategoria[c_categoria] = [];
        }
        permisosPorCategoria[c_categoria].push({ c_idpermiso, c_nombre });
    });

    return permisosPorCategoria;
}

function listarRoles(){
    $.ajax({
        url: '/ListarRoles',
        type: 'get',
        success: function (response) {
            let template = "";
            response.forEach(rol => {
                template += `
               <option value="${rol.c_idrol}">${rol.c_descr}</option>
            `;
                
            });
            $('#roles').html(template);
        }
    });
}



$('#modalUsuario').on('hidden.bs.modal', function () {
    $('#nombre').val('');
    $('#apellido').val('');
    $('#usuario_login').val('');
    $('#password').val('');
    $('#roles').val('1');
   
    $('#guardar_usuario').removeClass('d-none');
    $('#actualizar_usuario').addClass('d-none');
    $('#actualizar_usuario').data('id', '');

});

$('#modalRoles').on('hidden.bs.modal', function () {    
    $('#nombreRol').val('');
  
    $('#permisosContainer input').prop('checked', false);

});







