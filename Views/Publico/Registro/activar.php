<?php require_once('Views/Publico/Lib/Navbar-2.php');?>
<style>
body {
    background-image: url("Assets/Img/Fondo/img-fondo2.jpg");
    background-repeat: no-repeat;
    background-size: 100%;
}
label.error{
    display: none !important;
}
@media (max-width: 975px) {
    body{
        background-size: auto;
    }
}
</style>
<br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-5 col-md-5">
            <div class="card o-hidden border-0 shadow-lg ">
                <div class="pt-2 pb-2 bg-primary-card">
                    <div class="text-center">
                    </div>
                </div>
                <div class="col">
                    <div class="mt-3">
                        <div class="mb-1">
                            <div class="text-center img-icono"><img src="Assets/Img/Iconos/icono6.png" alt=""></div>
                        </div>
                        <div class="text-center mt-3">
                            <h1 class="h4 text-gray-900 mb-2 fw-bold" style="color:#431220;">Activación</h1>
                        </div>
                    </div>
                </div>
                <div class="row g-3 ms-4 me-5 mb-4">
                    <form action="" id="FrmActivar">
                        <div class="row gx-2">
                            <div class="col-sm-12 col-xl-12 mt-2 mt-3 mb-3">
                                Se le ha enviado un código a su correo, ingrese el código para activar su cuenta
                            </div>
                            <input type="hidden"  name="email" id="email" placeholder="Correo" value="<?php  echo $_SESSION['correoV']; ?>">
                            <div class="col-sm-12 col-xl-12 mb-3 text-center form-floating">
                                <input autocomplete="off" minlength="3" maxlength="5" type="text" class="form-control" name="codigo" id="codigo" placeholder="Ingrese su Código" required>
                                <label for="codigo">Ingrese su Código</label>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex flex-row-reverse">
                        <button type="button" id="activar" class="btn btn-primary btn-sm">Activar Cuenta</button>
                    </div>
                </div>
                <div class="pt-2 pb-2 bg-primary-card">
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('Views/Publico/Lib/Footer-2.php');?>
<script src="Js/Publico/activar.js"></script>