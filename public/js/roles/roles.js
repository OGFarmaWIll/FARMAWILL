
$(document).ready(function () {

  listarUsuarios();
});

$('#btnGuardarRol').click(function () {
    
    let nombreRol = $('#nombreRol').val();
    let permisos = [];

    $('input[name="permisos[]"]:checked').each(function () {

        permisos.push($(this).val());
    });

    $.ajax({
        url: '/guardarRol',
        type: 'POST',
        data: {
            nombreRol: nombreRol,
            permisos: permisos  
        },
        success: function (response) {
            alertaExito(response.mensaje);
            $('#modalRoles').modal('hide');
            listarRoles();
        }
    });
    
});
 

$('#guardar_usuario').click(function(){

  let nombre = $('#nombre').val();
  let apellido = $('#apellido').val();
  let usuario_login = $('#usuario_login').val();
  let password = $('#password').val();
  let rol = $('#roles').val();

  $.ajax({
    url: '/roles',
    type: 'POST',
    data: {
      nombre: nombre,
      apellido: apellido,
      usuario_login: usuario_login,
      password: password,
      rol: rol
    },
    success: function (response) {
        alertaExito(response.mensaje)
        $('#modalUsuario').modal('hide');
        listarUsuarios();
    }
  });

});


function listarUsuarios() {
  $.ajax({
      url: '/listarUsuarios',
      type: 'get',
      success: function (response) {
          console.log(response); 
           let template = "";

          response.forEach(usuario => {
              let usuario_roles = usuario.usuario_roles;
              let roles = usuario_roles[0].roles;

               template += `
                  <tr>
                      <td>${usuario.c_nombre} ${usuario.c_apellidos || ''}</td>
                      <td>${usuario.c_login}</td>
                      <td>${roles.c_descr}</td>
                      <td>
                          <button class="btn btn-primary btn-sm btn-editar" data-id="${usuario.c_idusuario}">Editar</button>
                         
                      </td>
                  </tr>
              `;

          });
          $('#body_usuarios').html(template)
      }
      
  });
}



$(document).on('click', '.btn-editar', function () {
    let id = $(this).data('id');
    
    $.ajax({
        url: '/roles/' + id,
        type: 'GET',
        success: function (response) {
           
            $('#nombre').val(response.c_nombre);
            $('#apellido').val(response.c_apellidos);
            $('#usuario_login').val(response.c_login);
            $('#password').val(response.c_password);
            $('#roles').val(response.usuario_roles[0].roles.c_idrol);
            $('#modalUsuario').modal('show');

            $('#guardar_usuario').addClass('d-none');
            $('#actualizar_usuario').removeClass('d-none');
            $('#actualizar_usuario').data('id', id);

        }
    });

});

$('#actualizar_usuario').click(function () {
    let id = $(this).data('id');
    let nombre = $('#nombre').val();
    let apellido = $('#apellido').val();
    let usuario_login = $('#usuario_login').val();
    let password = $('#password').val();
    let rol = $('#roles').val();
    
    $.ajax({
        url: '/roles/' + id,
        type: 'PUT',
        data: {
            nombre: nombre,
            apellido: apellido,
            usuario_login: usuario_login,
            password: password,
            rol: rol
        },
        success: function (response) {
            alertaExito(response.mensaje)
            $('#modalUsuario').modal('hide');
            listarUsuarios();
        }
    });



});










