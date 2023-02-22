<?php require_once('Views/Publico/Lib/Navbar-2.php');?>
<style>
body {
    background-image: url("Assets/Img/Fondo/img-fondo2.jpg");
    background-repeat: no-repeat;
    background-size: 100%;
}
@media (max-width: 975px) {
    body{
        background-size: auto;
    }
}
</style>
<br><br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-7">
            <div class="card o-hidden border-0 shadow-lg ">
                <div class="pt-2 pb-2 bg-primary-card"></div>
                <div class="col">
                    <div class="mt-3">
                        <div class="mb-1">
                            <div class="text-center img-icono"><img src="Assets/Img/Iconos/icono8.png" alt=""></div>
                        </div>
                        <div class="text-center mt-3">
                            <h1 class="h4 text-gray-900 mb-2 fw-bold" style="color:#431220;">Cambiar Contraseña</h1>
                        </div>
                    </div>
                </div>
                <div class="row g-3 ms-4 me-5 mb-4">
                    <div id="input-1">
                        <form action="" id="FrmCambiar">
                            <div class="row gx-2">
                                <div class="col-sm-12 col-xl-12 mb-3">
                                    <label class="form-label">Nombre:</label>
                                    <input maxlength="100" autocomplete="off" type="text" class="form-control" placeholder="Nombre" name="username" id="username" required>
                                </div>
                                <div class="col-sm-12 col-xl-12 mb-3">
                                    <label class="form-label">Correo:</label>
                                    <input maxlength="100" autocomplete="off" type="email" class="form-control" placeholder="Correo" name="email" id="email" required>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex flex-row-reverse">
                            <button type="button" name="cambiar" id="cambiar" class="btn btn-primary btn-sm">Cambiar contraseña</button>
                        </div>
                    </div>
                    <div id="input-2" class="d-none">
                        <form action="" id="FrmActualizar">
                            <div class="row gx-2">
                                <div class="col-sm-12 col-xl-12 mt-2 mb-3">
                                    Se le ha enviado un código a su correo, ingrese el código para cambiar la contraseña
                                </div>

                                <label class="col-sm-12 col-xl-4 mb-3">Código:</label>
                                <div class="col-sm-12 col-xl-4 mb-3">
                                    <input minlength="3" maxlength="5" autocomplete="off" type="text" class="form-control" placeholder="Codigo" name="codigo" id="codigo" required>
                                </div>
                                <div class="col-sm-12 col-xl-4"></div>
                                
                                <label class="col-sm-12 col-xl-4 mb-3">Contraseña:</label>
                                <div class="col-sm-12 col-xl-6 mb-3">
                                    <input minlength="4" maxlength="25" autocomplete="off" type="password" class="form-control" placeholder="Contraseña" name="clave1" id="clave1" required>
                                </div>

                                <label class="col-sm-12 col-xl-4 mb-3">Confirmar Contraseña:</label>
                                <div class="col-sm-12 col-xl-6 mb-3">
                                    <input minlength="4" maxlength="25" autocomplete="off" type="password" class="form-control" placeholder="Confirmar Contraseña" name="clave2" id="clave2" required>
                                </div>
                            </div>
                        </form>
                        <div class="d-flex flex-row-reverse">
                            <button type="button" name="actualizar" id="actualizar" class="btn btn-primary btn-sm">Actualizar Contraseña</button>
                        </div>
                    </div>
                </div>
                <div class="pt-2 pb-2 bg-primary-card"></div>
            </div>
        </div>
    </div>
</div>
<?php require_once('Views/Publico/Lib/Footer-2.php');?>
<script src="Js/Publico/clave.js"></script>