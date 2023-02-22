<?php require('Views/Asesor/Lib/sidebar.php');?>
<div class="mt-3">
    <div class="row">
        <div class="col-md-12 col-lg-4 mb-3 mt-3">
            <div class="position-relative bg-pr shadow-lg rounded">
                <div class="position-clase text-muted fw-bold">
                    Emprendedores Asignados
                </div>
                <div id="cont_emp" class="texto-cont"></div>
                <hr class="divider-card">
                <div class="footer-ps">
                    <i class="text-muted bi bi-info-circle-fill"></i>
                    <a class="text-muted" href="?path=Asesor&c=Emprendedores&a=inicio">Mostrar emprendedores</a>
                </div>
                <div class="position-absolute top-0 start-50-new translate-middle bg-1 shadow " style="background-color: #58182B;">
                    <div class="contenido-absolute"><i class="bi bi-person-lines-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-3 mt-3">
            <div class="position-relative bg-pr shadow-lg rounded">
                <div class="position-clase text-muted fw-bold">
                    Cantidad de Preguntas
                </div>
                <div id="cont_pre" class="texto-cont"></div>
                <hr class="divider-card">
                <div class="footer-ps">
                    <i class="text-muted bi bi-check-circle-fill"></i>
                    <a class="text-muted" href="?path=Asesor&c=Contacto&a=inicio">Mostrar Preguntas</a>
                </div>
                <div class="position-absolute top-0 start-50-new translate-middle bg-1 shadow " style="background-color: #8E2643;">
                    <div class="contenido-absolute"><i class="bi bi-chat-dots-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-3 mt-3">
            <div class="position-relative bg-pr shadow-lg rounded">
                <div class="position-clase text-muted fw-bold">
                    Reuniones Agendadas
                </div>
                <div id="cont_reuniones" class="texto-cont"></div>
                <hr class="divider-card">
                <div class="footer-ps">
                    <i class="text-muted bi bi-bookmark-heart-fill"></i>
                    <a class="text-muted" href="?path=Asesor&c=Citas&a=inicio">Mostrar Reuniones</a>
                </div>
                <div class="position-absolute top-0 start-50-new translate-middle bg-1 shadow " style="background-color: #D03864;">
                    <div class="contenido-absolute"><i class="bi bi-calendar2-week-fill"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-8 mb-3 mt-3">
            <div class="position-relative bg-pr shadow-lg rounded">
                <div class="text-pri1"><b>Bienvenido</b></div>
                <div class="text-pri2"><b>Asesor:</b> <?php echo $_SESSION['nombre']; ?></div>
                <div class="row mt-3">
                    <div class="col-md-6 col-lg-6">
                        <div class="text-center mb-4">
                            <a class="txt-btn" href="?path=Asesor&c=Formulario&a=inicio">
                                <img class="mb-3" src="Assets/Img/Iconos/icono9.png" width="125px" height="125px" alt="">
                                <br>
                                <b>Mostrar Datos del formulario</b>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="text-center mb-4">
                            <a class="txt-btn" href="?path=Asesor&c=Asesores&a=inicio">
                                <img class="mb-3" src="Assets/Img/Iconos/icono10.png" width="125px" height="125px" alt="">
                                <br>
                                <b>Agregar nuevo asesor</b>
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4 mb-3 mt-3">
            <div class="position-relative bg-pr shadow-lg rounded">
                <div class="space-prin"></div>
                <div class="text-center">
                    <img class="mb-3" src="Assets/Img/Info/gnius.png" width="200px" height="75px" alt="">
                </div> 
                <div class="row pp-card">
                    <div class="col-md-12 col-lg-12 mt-2">
                        <h5><b><i class="bi bi-check-lg"></i></b>&nbsp;&nbsp;Creación de Reportes</h5>
                    </div>
                    <div class="col-md-12 col-lg-12 mt-2">
                        <h5><b><i class="bi bi-check-lg"></i></b>&nbsp;&nbsp;Mostar datos de Formulario</h5>
                    </div>
                    <div class="col-md-12 col-lg-12 mt-2">
                        <h5><b><i class="bi bi-check-lg"></i></b>&nbsp;&nbsp;Agregar Asesores</h5>
                    </div>
                    <div class="col-md-12 col-lg-12 mt-2">
                        <h5><b><i class="bi bi-check-lg"></i></b>&nbsp;&nbsp;Agendar entrevistas</h5>
                    </div>
                    <div class="col-md-12 col-lg-12 mt-2">
                        <h5><b><i class="bi bi-check-lg"></i></b>&nbsp;&nbsp;Mostrar Emprendedores asignados</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>

<?php require('Views/Asesor/Lib/footer.php');?>
<script src="Js/Asesor/principal.js"></script>
