<div class="modal fade" id="Login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div class="container-fluid">
                <div class="d-flex align-items-end flex-column bd-highlight">
                    <div class="p-2 bd-highlight"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                </div>
                <div class="mb-3">
                    <div class="text-center mb-2"><img src="Assets/Img/Iconos/icono7.png" width="90px" height="90px" alt=""></div>
                    <div class="text-center">
                        <h1 class="h3 text-gray-900">Iniciar Sesión</h1>
                    </div>
                </div>
                <form id="FormLogin">
                    <div class="container-fluid container-dif mb-2">
                        <div class="mb-2">
                            <label for="correo" class="col-form-label">Correo*</label>
                            <input id="correo" type="email" name="correo" class="form-control dif" autocomplete="off" required>
                        </div>
                        <div class="mb-2">
                            <label for="clave" class="col-form-label">Contraseña*</label>
                            <input id="clave" type="password" name="clave" class="form-control dif" autocomplete="off" required>
                        </div>
                    </div> 
                </form>
                <div class="d-flex align-items-end flex-column bd-highlight">
                    <div class="p-2 bd-highlight"><a href="?path=Publico&c=cambiarclave&a=inicio" class="link-secondary">Olvide la contraseña</a></div>
                </div>
                <div class="d-flex flex-row-reverse">
                    <div class="p-2"><button type="button" name="ingresar" id="ingresar" class="btn btn-primary btn-sm">Ingresar</button> </div>
                    <div class="p-2"><button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div class="container d-flex bd-highlight">
                <div class="p-2 bd-highlight">¿No tienes una cuenta? <a href="?path=Publico&c=Registro&a=inicio" class="link-secondary">Registrate</a> </div>
            </div>
        </div>
        </div>
    </div>
</div>