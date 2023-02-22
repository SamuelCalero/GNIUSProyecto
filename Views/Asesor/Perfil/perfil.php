<style>
    label.error{
        display: none !important;
    }
</style>
<div class="modal fade" id="ModalPerfilAsesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perfil Asesor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="POST" id="perfil" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="text-center">
                        
                        <input id="imagen" class="d-none" type="file" name="imagen" onchange="preview(event)" accept="image/jpeg,image/jpg,image/png">

                        <div class="position-relative">
                            <img id="img" class="img-user" src="" alt="">
                            <img class="img-user d-none" id="img-preview">
                            <div class="position-absolute top-90 start-55 translate-middle">
                                <label for="imagen" class="btn-img" id="icon-perfil"><i class="bi bi-images"></i></label>
                                <span id="icono-perfil2"></span>
                            </div>
                        </div>
                        <label id="nombre-imagen"></label>
                    </div>
                    <div class="container">
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="input-group-sm mb-1">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre" autocomplete="off" maxlength="100" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-sm mb-1">
                                    <label class="form-label">Correo</label>
                                    <input type="text" class="form-control" id="correo_usuario" name="correo_usuario" placeholder="Correo" autocomplete="off" maxlength="100" readonly required>
                                </div>
                            </div>
                            <div class="col-8">
                                <label class="form-label">Clave</label>
                                <div class="input-group input-group-sm mb-1">
                                    <input type="password" class="form-control" id="clave_usuario" name="clave_usuario" placeholder="Clave" autocomplete="off" maxlength="25" minlength="4" required>
                                    <div class="input-group-text ">
                                        <input class="form-check-input mt-0" id="mostrar" type="checkbox" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group-sm mb-1">
                                    <label class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" placeholder="Telefono" autocomplete="off" maxlength="9" minlength="9" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-sm mb-1">
                                    <label class="form-label">Dirección:</label>
                                    <textarea class="form-control" id="direccion_usuario" name="direccion_usuario" aria-label="With textarea" autocomplete="off" maxlength="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-sm" id="guardar_perfil">Guardar</button>
            </div>
        </div>
    </div>
</div>