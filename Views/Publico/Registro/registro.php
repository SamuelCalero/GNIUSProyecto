<?php require_once('Views/Publico/Lib/Navbar-2.php');?>
<style>
body {
    background-image: url("Assets/Img/Fondo/img-fondo1.jpg");
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-7 col-md-7">
            <div class="card border-0 shadow-lg my-5">
                <div class="pt-2 pb-1 bg-primary-card">
                    <div class="text-center">
                        <p class="h4 text-gray-900">Registro</p>
                    </div>
                </div>
                <div class="ps-4 pe-4 pt-3">
                    <form action="" id="registrarse">
                        <div class="row gx-2">
                            <div class="col-sm-12 col-xl-12 mb-3">
                                <label class="form-label">Nombre:</label>
                                <input maxlength="100" autocomplete="off" type="text" class="form-control" placeholder="Nombre" name="username" id="username" required>
                            </div>
                            <div class="col-sm-12 col-xl-8 mb-3">
                                <label class="form-label">Correo:</label>
                                <input maxlength="100" autocomplete="off" type="email" class="form-control" placeholder="Correo" name="email" id="email" required>
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label class="form-label">Teléfono:</label>
                                <input minlength="9" maxlength="9" autocomplete="off" type="text" class="form-control" placeholder="Teléfono" name="telefono" id="telefono" required>
                            </div>
                            <div class="col-sm-12 col-xl-6 mb-3">
                                <label class="form-label">Contraseña:</label>
                                <input minlength="4" maxlength="25" autocomplete="off" type="password" class="form-control" placeholder="Contraseña" name="clave1" id="clave1" required>
                            </div>
                            <div class="col-sm-12 col-xl-6 mb-3">
                                <label class="form-label">Confirmar contraseña:</label>
                                <input minlength="4" maxlength="25" autocomplete="off" type="password" class="form-control" placeholder="Confirmar contraseña" name="clave2" id="clave2" required>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" name="guardar" id="guardar" class="btn btn-primary btn-sm">Ingresar</button>
                    </div>
                </div>
                <hr class="dropdown-divider">
                <div class="ps-3 footer-form">
                    <p class="login-register-text">¿Tienes una cuenta? <a class="login-register-text" data-bs-toggle="modal" data-bs-target="#Login" href="">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php require_once('Views/Publico/Lib/Footer-2.php');?>
<script src="Js/Publico/registro.js"></script>