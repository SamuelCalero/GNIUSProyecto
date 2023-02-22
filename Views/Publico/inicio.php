<?php require_once('Views/Publico/Lib/Navbar.php');?>
    <!--carousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/slider/Slider1.jpg" class="d-block img-fluid w-100 oscurecer-img" alt="...">
                <div class="carousel-caption d-md-block carousel-caption-opc1">
                    <h1 class="titulo-opc">Bienvenidos a G'NIUS</h1>
                    <hr class="d-none d-xl-block divider">
                    <p class="info-opc">Generando Novedosas Investigaciones Útiles para la Sociedad</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/Slider3.jpg" class="d-block img-fluid w-100 oscurecer-img" alt="...">
                <div class="carousel-caption d-md-block carousel-caption-opc2">
                    <p class="info-opc p-opc2"><i class="bi bi-check"></i> Capacitaciones.</p>
                    <p class="info-opc p-opc2"><i class="bi bi-check"></i> Coworking.</p>
                    <p class="info-opc p-opc2"><i class="bi bi-check"></i> Uso de laboratorios.</p>
                    <p class="info-opc p-opc2"><i class="bi bi-check"></i> Financiamiento.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/slider/Slider2.jpg" class="d-block img-fluid w-100 oscurecer-img" alt="...">
                <div class="carousel-caption d-md-block carousel-caption-opc2">
                    <h1 class="titulo-opc1">G'nius</h1>
                    <p class="info-opc">Transforma tu idea en un negocio <br> Nosotros te asesoramos...</p>
                    <div class="d-grid gap-2 d-md-block">
                        <a href="#contacto" class="btn d-none d-xl-block col-2 btn-carousel-opc">Contactar</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
<!--Sobre-->
<div class="altura d-none d-xl-block"></div>
    <section class="page-section bg-primary" id="sobre">
        <div class="container px-2 px-lg-2">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class=" mt-3">Sobre G’nius</h2>
                    <hr class="divider2 divider-light" />
                    <p class="mb-3">G’nius es la oficina de apoyo a la innovación a través de la cual se incuba y se aceleran proyectos que nacen de la investigación y que tienen un gran potencial para convertirse en empresas de base tecnológicas. Se busca preparar a
                        los emprendedores para que cuenten con el conocimiento necesario y las capacidades para enfrentarse a la competencia.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--Servicios-->
    <section class="altura page-section" id="servicios">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Servicios</h2>
            <hr class="divider2 divider-light" />
        </div>
        <div class="container px-4 py-1" id="featured-3">
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="feature-icon bg-primary bg-gradient shadow">
                        <i class="bi-icon bi bi-lightbulb"></i>
                    </div>
                    <h4>Capacitaciones</h4>
                    <p>Brindar talleres impartidos por expertos relacionado al área de emprendimiento requerida.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-primary bg-gradient shadow">
                        <i class="bi-icon bi bi-diagram-3"></i>
                    </div>
                    <h4>Coworking</h4>
                    <p>Brindar un espacio en el que diferentes entidades que no sean del mismo sector puedan compartir conocimiento.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-primary bg-gradient shadow">
                        <i class="bi-icon bi bi-building"></i>
                    </div>
                    <h4>Uso de laboratorios</h4>
                    <p>Poner a disposición el equipo necesario para llevar a cabo el emprendimiento.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-primary bg-gradient shadow">
                        <i class="bi-icon bi bi-cash-coin"></i>
                    </div>
                    <h4>Financiamiento</h4>
                    <p>Nos encargamos de realizar la búsqueda de una red de contactos.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-primary bg-gradient shadow">
                        <i class="bi-icon bi bi-people"></i>
                    </div>
                    <h4>Asesorías</h4>
                    <p>Brindar asesoría sobre servicios financieros, legales, administrativos y propiedad intelectual.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon bg-primary bg-gradient shadow">
                        <i class="bi-icon bi bi-gem"></i>
                    </div>
                    <h4>Marketing</h4>
                    <p>Conocer las diferentes técnicas o estrategias para estudiar el comportamiento de los mercados.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Contacto-->
    <section class="altura page-section" id="contacto">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">Contacto</h2>
            </div>
            <ul class="timeline">
                <li>
                    <div data-aos="flip-up">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="assets/img/linea-tiempo/paso1.jpg" alt="..." />
                        </div>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Paso 1</h4>
                            <h5 class="text-titulo-opc">Crea un usuario</h5>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted text-opc">
                                El primer paso es crear un usuario en la pagina oficial de G’NIUS.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div data-aos="flip-right">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="assets/img/linea-tiempo/paso2.jpg" alt="..." />
                        </div>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Paso 2</h4>
                            <h5 class="text-titulo-opc">Contáctenos</h5>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted text-opc">
                                En este paso debes agendar una cita con un asesor de G'NIUS, esto lo debes hacer con el usuario que has creado en nuestro sitio web.
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div data-aos="flip-down">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="assets/img/linea-tiempo/paso3.jpg" alt="..." />
                        </div>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Paso 3</h4>
                            <h5 class="text-titulo-opc">Llenar formulario</h5>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted text-opc">
                                El llenado de esta solicitud es para estudiar que beneficios ofrecer de acuerdo a la necesidad y naturaleza del emprendimiento.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div data-aos="flip-left">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="assets/img/linea-tiempo/paso4.jpg" alt="..." />
                        </div>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Paso 4</h4>
                            <h5 class="text-titulo-opc">Entrevista</h5>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted text-opc">
                                Esperas a que tu asesor asignado se contacte contigo y agende la entrevista. En este paso se aprueba el acceso a programa de mentores, uso de instalaciones para coworking, entre otros.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4 class="letra-timeline">
                            Sigue los <br> pasos y <br> serás parte de <br> G’nius <br>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--Portafolio-->
    <div class="altura" id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portafolio/portafolio1.jpg" title=" Coworking">
                        <div data-aos="fade-up">
                            <img class="img-fluid" src="assets/img/portafolio/portafolio1.jpg" alt="..." />
                        </div>
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Coworking</div>
                            <div class="project-name">Espacio de trabajo compartido donde varias empresas o emprendedores llevan a cabo su actividad</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portafolio/portafolio2.jpg" title="G'NIUS">
                        <div data-aos="flip-left">
                            <img class="img-fluid" src="assets/img/portafolio/portafolio2.jpg" alt="..." />
                        </div>
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">G'NIUS</div>
                            <div class="project-name">Oficina de apoyo a la innovación</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portafolio/portafolio3.jpg" title="Talleres">
                        <div data-aos="fade-down">
                            <img class="img-fluid" src="assets/img/portafolio/portafolio3.jpg" alt="..." />
                        </div>

                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Talleres</div>
                            <div class="project-name">Podrás capacitarte con los talleres que G'NIUS ofrece</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portafolio/portafolio4.jpg" title="Uso de laboratorios especializados">
                        <div data-aos="fade-down">
                            <img class="img-fluid" src="assets/img/portafolio/portafolio4.jpg" alt="..." />
                        </div>

                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Uso de laboratorios especializados</div>
                            <div class="project-name">G'NIUS te dará acceso a los laboratorios que necesites</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portafolio/portafolio5.jpg" title="Validación de idea de negocio">
                        <div data-aos="flip-right">
                            <img class=" img-fluid " src="assets/img/portafolio/portafolio5.jpg " alt="... " />
                        </div>

                        <div class="portfolio-box-caption ">
                            <div class="project-category text-white-50 ">Validación de idea de negocio</div>
                            <div class="project-name ">G'NIUS te ayudará a definir tu idea de negocio</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 ">
                    <a class="portfolio-box " href="assets/img/portafolio/portafolio6.jpg " title="Asesorías">
                        <div data-aos="fade-up">
                            <img class="img-fluid " src="assets/img/portafolio/portafolio6.jpg " alt="... " />
                        </div>

                        <div class="portfolio-box-caption ">
                            <div class="project-category text-white-50 ">Asesorías</div>
                            <div class="project-name ">G'NIUS te ofrece asesorías fiscales y entre otras.</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

<?php require_once('Views/Publico/Lib/Footer.php');?>
<script>
$(document).ready(function() {
    $.ajax({
        url: '?path=publico&c=Login&a=varSesion',
        data: { "consultar": "Datos" },
        type: 'POST',
        dataType: 'json',
        success: function(data) {
        if(data=="abrir"){
            $('#Login').modal('show');
        }
    }
    })
});
</script>