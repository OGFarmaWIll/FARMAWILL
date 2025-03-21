<div class="modal fade" id="modalCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formCliente">
          <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold">Nombre y Apellido</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <span id="errorNombre_cliente" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" id="email" name="email" class="form-control">
            <span id="errorEmail" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="dni" class="form-label fw-semibold">DNI</label>
            <input type="text" id="dni" name="dni" class="form-control">
            <span id="errorDni" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label fw-semibold">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control">
            <span id="errorTelefono" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="direccion" class="form-label fw-semibold">Dirección</label>
            <input type="text" id="direccion" name="direccion" class="form-control">
            <span id="errorDireccion" class="text-danger"></span>
          </div>

          <input type="hidden" id="cliente_id">

          <div class="modal-footer d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnGuardar">Crear Cliente</button>
            <button type="button" class="btn btn-primary d-none" id="btnActualizar">Actualizar Cliente</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="{{ asset('js/cliente/cliente_crear.js') }}"></script>
