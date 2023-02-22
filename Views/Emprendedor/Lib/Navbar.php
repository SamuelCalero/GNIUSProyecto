<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CLOUDFLARE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- ICONS -->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- STYLE -->
    <link rel="stylesheet" href="Assets/Css/emprendedor-estilos.css">
    <link rel="icon" type="image/x-icon" href="assets/img/info/favicon.ico" />
    <title>G'nius</title>
</head>

<body class="px-5">
    <?php require_once("Views/Emprendedor/Contacto/contacto.php"); ?>
    <!--MENU-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-2 px-lg-2">
            <a class="navbar-brand" href="?path=Emprendedor&c=Principal&a=inicio"><img src="assets/img/info/gnius.png" class="" width="125px" height="45px" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a id="reunion" class="nav-link" href="?path=Emprendedor&c=citas&a=inicio">Agendar Reunión</a></li>
                    <li class="nav-item"><a id="formulario" class="nav-link" href="?path=Emprendedor&c=formulario&a=inicio">Formulario</a></li>
                    <li class="nav-item"><a class="nav-link li-contacto" href="" data-bs-toggle="modal" data-bs-target="#Contacto">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="?path=publico&c=login&a=cerrarsesion">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="btn-flotante-div" data-bs-toggle="tooltip" data-bs-placement="left" title="Contactarme con un asesor">
        <a href="" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#Contacto">
            <i class="bi bi-chat-left-dots"></i>
        </a>
    </div>