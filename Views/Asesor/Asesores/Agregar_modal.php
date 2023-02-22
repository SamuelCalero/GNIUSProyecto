<div class="modal fade" id="agregarAsesor" tabindex="-1" aria-labelledby="vagregarAsesorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarAsesorLabel">Agregar Asesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="form_nuevo" class="f1">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <input  autocomplete="off" maxlength="100" type="text" class="form-control" id="nombre_add" name="nombre_add" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Correo:</label>
                <input  autocomplete="off" maxlength="100" type="email" class="form-control" id="correo_add" name="correo_add" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Teléfono:</label>
                <input autocomplete="off" minlength="9" maxlength="9" type="text" class="form-control" id="telefono_add" name="telefono_add" required>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Dirección:</label>
                <textarea autocomplete="off" maxlength="150" cols="20" rows="2" class="form-control" id="direccion_add" name="direccion_add" required></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-sm btn-primary" id="guardar_asesor">Guardar</button>
      </div>
    </div>
  </div>
</div>