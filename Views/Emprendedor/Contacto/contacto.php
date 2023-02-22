<div class="modal fade" id="Contacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="FormContacto">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Correo:</label>
            <input type="email" class="form-control is-valid" name="email" id="email" value="<?php  echo $_SESSION['correo']; ?>" readonly required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea maxlength="500" class="form-control" name="mensaje" id="mensaje" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
        <button id="btnContacto" name="btnContacto" type="button" class="btn btn-primary btn-sm">Enviar mensaje</button>
      </div>
    </div>
  </div>
</div>