<div class="modal fade" id="ModalEmprendedor" tabindex="-1" aria-labelledby="ModalEmprendedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEmprendedorLabel">Datos generales Emprendedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" readonly>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="correo" readonly>
                    <label for="correo">Correo</label>
                </div>
                <div class="row g-2">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="telefono" readonly>
                            <label for="telefono">Telefono</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="direccion" readonly></textarea>
                    <label for="direccion">Dirección</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>