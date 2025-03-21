<div class="modal fade" id="modalDoctor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg rounded-3">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Doctor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formDoctor">
          

          <div class="mb-3">
            <label for="codigoMedico" class="form-label fw-semibold">Código Médico</label>
            <input type="text" id="codigoMedico" name="codigoMedico" class="form-control">
            <span id="errorCodigoMedico" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="nombre" class="form-label fw-semibold">Nombre y Apellido</label>
            <input type="text" id="nombre_doctor" name="nombre" class="form-control">
            <span id="errorNombre_doctor" class="text-danger"></span>
          </div>
          
          <div class="mb-3">
            <label for="especialidad" class="form-label fw-semibold">Especialidad</label>
            <input type="text" id="especialidad" name="especialidad" class="form-control">
            <span id="errorEspecialidad" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" id="email_doctor" name="email_doctor" class="form-control">
            <span id="errorEmail_doctor" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="direccion" class="form-label fw-semibold">Dirección</label>
            <input type="text" id="direccion_doctor" name="direccion" class="form-control">
            <span id="errorDireccion" class="text-danger"></span>
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label fw-semibold">Teléfono</label>
            <input type="text" id="telefono_doctor" name="telefono" class="form-control">
            <span id="errorTelefono" class="text-danger"></span>
          </div>

          <input type="hidden" id="doctor_id">

          <div class="modal-footer d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary" id="btnGuardar_doctor">Crear Doctor</button>
            <button type="button" class="btn btn-primary d-none" id="btnActualizar">Actualizar Doctor</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="{{ asset('js/doctor/doctor_crear.js') }}"></script>


