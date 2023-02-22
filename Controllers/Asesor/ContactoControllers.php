<?php
verRol('Asesor');
include_once("Models/Asesor/ContactoModel.php");
include_once("Models/Publico/CorreoModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){

    $obj = new Contacto();
    $objCorreo = new Correo();

    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Contacto";
            require_once "Views/Asesor/Contacto/contacto.php";
            break;
        case 'consultar':
            echo json_encode($obj->Consultar($_SESSION['id']));
            break;
        case 'contar':
            if($_POST){
                echo json_encode($obj->Contar($_SESSION['id']));
            }else{
                header('location:?path=Asesor&c=Contacto&a=inicio');
            }
            break;
        case 'Obtener':
            if($_POST){
                echo json_encode($obj->Obtener($_POST['id']));
            }else{
                header('location:?path=Asesor&c=Contacto&a=inicio');
            }
            break;
        case 'Responder':
            if($_POST){
                $stmt = $obj->responder($_POST['id'],$_POST['correo'], $_POST['respuesta']);
                if($stmt=="Ok"){
                    $stmt = $objCorreo->Correo('', '', $_POST['correo'],"Respuesta a consulta", "En respuesta a tu consulta,", $_POST['respuesta'],"Gracias por enviarnos tus dudas.");
                    echo json_encode($stmt);
                }else{
                    echo json_encode($stmt);
                }
            }else{
                header('location:?path=Asesor&c=Contacto&a=inicio');
            }
            break;
        default:
            header('location:?path=Asesor&c=Contacto&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=Contacto&a=inicio');
}


?>