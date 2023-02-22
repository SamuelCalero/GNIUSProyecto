<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS AND ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--google material icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!--ICO-->
    <link rel="icon" type="image/x-icon" href="assets/img/info/favicon.ico" />
    <!--DATA TABLES-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
    <!----CSS---->
    <link rel="stylesheet" href="Assets/Css/asesor-estilo.css">
    <title>Dashboard - Asesor</title>
</head>
<body>
<?php require_once("Views/Asesor/Perfil/perfil.php"); ?>
<div class="wrapper">
        <div class="body-overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h2>
                    <span>G'NIUS</span>
                </h2>
                <h3>
                    <span>Oficina de Apoyo a la Innovación</span>
                    <hr class="divider2">
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li class="">
                    <div class="text-center">
                        <img id="img-menu" class="img-user" src="" alt="">
                        <!--img src="Assets/Img/Foto/foto-perfil.jpg" class="img-user" alt=""-->
                        <button type="button" class="boton-avatar" data-bs-toggle="modal" data-bs-target="#ModalPerfilAsesor">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </div>
                </li>
                <li class="text-user">
                    <div class="text-center">
                        <h6 class="text-user-rol fw-bold">Asesor:</h6>
                        <!--a href="" class="text-user-information" -->
                            <h6 class="text-user-name text-muted">
                                <?php echo $_SESSION['nombre']; ?><!--i class="icon-text bi bi-eye-fill"></i-->
                            </h6>
                        <!--/a-->
                    </div>
                </li>
                <li class="">
                    <a href="?path=Asesor&c=Principal&a=inicio" data-title="Inicio"><i class="material-icons">home</i><span>Inicio</span></a>
                </li>
                <li class="">
                    <a href="?path=Asesor&c=Citas&a=inicio" data-title="Reuniones"><i class="material-icons">event_note</i><span>Reuniones</span></a>
                </li>
                <li class="">
                    <a href="?path=Asesor&c=Contacto&a=inicio" data-title="Contacto"><i class="material-icons">question_answer</i><span>Contacto</span></a>
                </li>
                <li class="">
                    <a href="?path=Asesor&c=Formulario&a=inicio" data-title="Formularios"><i class="icons bi bi-ui-radios"></i><span>Formulario</span></a>
                </li>
                <li class="">
                    <a href="?path=Asesor&c=DatosEmprendedores&a=inicio" data-title="Formularios"><i class="material-icons">article</i><span>Datos Formulario</span></a>
                </li>
                <!--li class="dropdown" data-title="Emprendedores/Empresas">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">article</i><span>Datos</span></a>
                    <ul class="collapse list-unstyled menu list-sidebar" id="pageSubmenu">
                        <li>
                            <a href="?path=Asesor&c=DatosEmprendedores&a=inicio"><i class="icons bi bi-person-workspace"></i>Emprendedores</a>
                        </li>
                        <li>
                            <a href="?path=Asesor&c=DatosEmpresas&a=inicio"><i class="material-icons">business</i>Empresas</a>
                        </li>
                    </ul>
                </li-->
                <li class="dropdown" data-title="Asesores/Emprendedores">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="icons bi bi-person-lines-fill"></i><span>Usuarios</span>
                    </a>
                    <ul class="collapse list-unstyled menu list-sidebar" id="pageSubmenu1">
                        <li>
                            <a href="?path=Asesor&c=Asesores&a=inicio"><i class="icons bi bi-person-workspace"></i>Asesores</a>
                        </li>
                        <li>
                            <a href="?path=Asesor&c=Emprendedores&a=inicio"><i class="icons bi bi-people-fill"></i>Emprendedores</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="?path=publico&c=login&a=cerrarsesion" data-title="Salir"><i class="icons bi bi-box-arrow-left"></i><span>Cerrar sesión</span></a>
                </li>
            </ul>
        </nav>
        <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!---------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none"><span class="material-icons">chevron_left</span></button>
                        <h3 class="navbar-brand" href="#"> <?php echo $titulo?>
                            <hr class="divider">
                        </h3>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent"></div>
                    </div>
                </nav>
            </div>
            <div class="main-content">