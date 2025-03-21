<div class="modal fade" id="modalProveedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formProveedor">
          <div class="mb-3">
            <label for="ruc" class="form-label fw-semibold">RUC</label>
            <input type="text" id="ruc" name="ruc" class="form-control">
            <span id="errorRuc" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold">Nombre o Razon Social</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <span id="errorNombre" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="direccion" class="form-label fw-semibold">Dirección</label>
            <input type="text" id="direccion" name="direccion" class="form-control">
            <span id="errorDireccion" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" id="email" name="email" class="form-control">
            <span id="errorEmail" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label fw-semibold">Teléfono</label>
            <input type="text" id="telefono" name="telefono" class="form-control">
            <span id="errorTelefono" class="text-danger"></span>
          </div>

          <input type="hidden" id="proveedor_id">

          <div class="modal-footer d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnGuardar">Crear Proveedor</button>
            <button type="button" class="btn btn-primary d-none" id="btnActualizar">Actualizar Proveedor</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
