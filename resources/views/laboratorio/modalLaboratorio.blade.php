<div class="modal fade" id="modalLaboratorio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Laboratorio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formLaboratorio">
          <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold">Nombre del laboratorio</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <span id="errorNombre" class="text-danger"></span>
          </div>
          <div class="">
            <label for="tipo" class="form-label fw-semibold">Tipo</label>
            <select id="tipo" name="tipo" class="form-select">
              <option value="COMERCIAL">COMERCIAL</option>
              <option value="GENERICO">GENERICO</option>
            </select>
          </div>
          <span id="errorTipo" class="text-danger"></span>

          <input type="hidden" id="laboratorio_id">

          <div class="modal-footer d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnGuardar">Crear Laboratorio</button>
            <button type="button" class="btn btn-primary d-none" id="btnActualizar">Actualizar Laboratorio</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
