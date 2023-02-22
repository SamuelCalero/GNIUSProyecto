<?php require('Views/Emprendedor/Lib/Navbar.php');?> 
<div class="divisor"></div>
<div class="container mt-5">
    <div class="container px-5">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <h1 class="titulo-opc">G'NIUS</h1>
                <p class="info-opc">Oficina de Apoyo a la Innovación</p>
                <hr class="divider">
                <h4 class="text-capitalize"><b>Bienvenido: </b><?php echo $_SESSION['nombre'];?></h4>
            </div>
            <div class="col-lg-3 ">
                <div class="div-rel-img">
                    <div class="div-abs-img1"></div>
                    <img class="div-abs-img" src="Assets/Img/Fondo/img-card1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id" id="id">
<div class="container">
    <div class="row gx-5">
        <div class="col-sm-12 col-xl-6">
            <div class="mt-5">
                <div id="card-index" class="position-relative shadow-lg ">
                    <div class="position-absolute top-0 start-0 translate-middle">
                        <img class="img-index" id="foto-index" name="foto-index" alt="">
                    </div>
                    <div class="ms-4 me-4">
                        <div class="titulo-rl1" id="nombreAsesor"></div>
                        <div class="correo-rl text-lowercase fst-italic" id="correoAsesor"></div>
                        Mucho gusto. Seré tu asesor encargado, seré quien te coordine en todo el proceso para ser parte de G'NIUS, si tienes alguna pregunta no dudes en contactarme
                        <hr>
                        <div class="d-flex align-items-end flex-column bd-highlight">
                            <div class="pb-1 bd-highlight"><a data-bs-toggle="modal" data-bs-target="#Contacto" class="link-secondary">Contactarme</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="mt-5">
                <div id="card-index" class="position-relative shadow-lg ">
                    <div class="position-absolute top-0 start-0 translate-middle">
                        <img class="img-index" src="Assets/Img/Iconos/icono1.png" alt="">
                    </div>
                    <div class="ms-4 me-4">
                        <div class="titulo-rl"><b>¿QUIÉNES SOMOS?</b></div>
                        G'nius (Generando Novedosas Investigaciones Útiles para la Sociedad), la función principal es lograr la transferencia del conocimiento tecnológico a la sociedad por medio de un cambio en los procesos de investigación, que permita que los resultados se convierta en un producto perfilado a solucionar un problema tecnológico.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container mt-1">
    <div class="row gx-5">
        <div class="col-sm-12 col-xl-4">
            <div class="mt-5">
                <div id="card-index" class="position-relative shadow-lg ">
                    <div class="position-absolute top-0 start-0 translate-middle">
                        <img class="img-index" src="Assets/Img/Iconos/icono2.png" alt="">
                    </div>
                    <div class="ms-4 me-4">
                        <div class="titulo-rl"><b>Visión</b></div>
                        Ser la oficina integradora que apoye, estimule y promueva el fomento del emprendimiento y la creación de Empresas Spin-off Universitarias, con base tecnológica para que impulsen el desarrollo y la innovación empresarial del país, como extensión del deber ser de la Universidad.Ser la oficina integradora que apoye, estimule y promueva el fomento del emprendimiento y la creación de Empresas Spin-off Universitarias, con base tecnológica para que impulsen el desarrollo y la innovación empresarial del país, como extensión del deber ser de la Universidad.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="mt-5">
                <div id="card-index" class="position-relative shadow-lg ">
                    <div class="position-absolute top-0 start-0 translate-middle">
                        <img class="img-index" src="Assets/Img/Iconos/icono3.png" alt="">
                    </div>
                    <div class="ms-4 me-4">
                    <div class="titulo-rl"><b>Misión</b></div>
                        La Oficina de Apoyo a la Innovación G'NIUS, existe para integrar y vincular, al sector académico con los sectores productivos, aportando soluciones pertinentes desde la conformación de equipos de trabajo universitarios, que permita la creación de las Spin-off Universitarias y el desarrollo empresarial con base a procesos de investigación, desarrollo e innovación.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="mt-5">
                <div id="card-index" class="position-relative shadow-lg ">
                    <div class="position-absolute top-0 start-0 translate-middle">
                        <img class="img-index" src="Assets/Img/Iconos/icono4.png" alt="">
                    </div>
                    <div class="ms-4 me-4">
                    <div class="titulo-rl"><b>Objetivo</b></div>
                        Apoyar empresas capaces de generar propiedad intelectual, patentes e innovación al servicio del desarrollo empresarial y productivo de El Salvador.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php require('Views/Emprendedor/Lib/Footer.php');?>
<script src="Js/Emprendedor/principal.js"></script>