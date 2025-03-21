 $('#btnAcceder').click(function () {
    let name = $('#name').val().trim();
    let password = $('#password').val().trim();
        if (!validarCampos()) return;

        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "login",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                c_login: name,
                c_pass: password
            },
            success: function (response) {
                console.log(response);
                window.location.href = "/dashboard";
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    $('#error_login').text('Credenciales incorrectas.');
                } else {
                    $('#error_login').text('Error en el servidor. Intente nuevamente.');
                }
            }
        });
        


    function validarCampos() {
        let name = $('#name').val().trim();
        let password = $('#password').val().trim();

         let isValid = true;

        $('#error_name').text('');
        $('#error_password').text('');
        $('#error_login').text('');

        if (name === '') {
            $('#error_name').text('El usuario es obligatorio.');
            isValid = false;
        }

        if (password === '') {
            $('#error_password').text('La contraseña es obligatoria.');
            isValid = false;
        }

        return isValid;
    }
});
