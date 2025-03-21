

function alertaExito(mensaje) {
   
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: mensaje,
        showConfirmButton: false,
        timer: 1100
    })

}

function alertaError(mensaje) {
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: mensaje,
        showConfirmButton: false,
        timer: 1100
    })
}

function alertaAdvertencia(mensaje) {
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: mensaje,
        showConfirmButton: false,
        timer: 1100
    })
}

function alertaEliminar(callback) {
    Swal.fire({
        title: "Confirmación",
        text: "¿Estás seguro de que deseas eliminar?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            callback(); 
            alertaExito("Eliminado correctamente");
        }
    });
}


function cerrarModal(modalId) {
    let modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
    if (modal) modal.hide();
}



