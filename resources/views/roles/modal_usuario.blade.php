<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  ">
                <h5 class="modal-title" id="modalUsuarioLabel">Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12 row">

                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellido">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Usuario Login</label>
                    <input type="text" class="form-control" id="usuario_login">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">password</label>
                    <input type="text" class="form-control" id="password">
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="roles">

                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="guardar_usuario">
                        <i class="fas fa-save"></i> Guardar</button>

                    <button type="button" class="btn btn-success d-none" id="actualizar_usuario">
                        <i class="fas fa-save"></i> Actualizar</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
</div>
