
<div class="modal fade" id="Responder" tabindex="-1" aria-labelledby="vagregarAsesorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarAsesorLabel">Responder Preguntas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="FormResponder" class="f1">
                    <input id="id" type="hidden" name="id" class="form-control dif" >
                    <div class="mb-3">
                        <label class="col-form-label">Correo:</label>
                        <input  autocomplete="off" type="email" class="form-control is-valid" id="correo" name="correo" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Mensaje:</label>
                        <textarea  autocomplete="off" class="form-control is-valid" id="mensaje" name="mensaje" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Respuesta:</label>
                        <textarea id="respuesta" name="respuesta" autocomplete="off" maxlength="500" class="form-control" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" name="enviar" id="enviar" class="btn btn-primary btn-sm">Enviar</button>
            </div>
        </div>
    </div>
</div>