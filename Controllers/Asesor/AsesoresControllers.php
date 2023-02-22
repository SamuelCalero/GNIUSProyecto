<?php
verRol('Asesor');
include_once("Models/Asesor/AsesoresModel.php");
include_once("Models/Publico/PasswordModel.php");
include_once("Models/Publico/CorreoModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Asesores();
    $objClave = new Claves();
    $objCorreo = new Correo();

    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Asesores";
            require_once "Views/Asesor/Asesores/Asesores.php";
            break;
        case 'consultar':
            if($_POST){
                echo json_encode($obj->Consultar());
            }else{
                header('location:?path=Asesor&c=Asesores&a=inicio');
            }
            break;
        case 'contar':
            if($_POST){
                echo json_encode($obj->Contar());
            }else{
                header('location:?path=Asesor&c=Asesores&a=inicio');
            }
            break;
        case 'obtener':
            if($_POST){
                echo json_encode($obj->Obtener($_POST['id']));
            }else{
                header('location:?path=Asesor&c=Asesores&a=inicio');
            }
            break;
        case 'eliminar':
            if($_POST){
                $stmt = $obj->Eliminar($_POST['id']);
                echo json_encode($stmt);
            }else{
                header('location:?path=Asesor&c=Formulario&a=inicio');
            }
            break;
        case 'guardar':
            $clave = rand(1000, 99999);
            $claveE =  $objClave->encryption($clave);
            $stmt = $obj->Guardar($_POST['correo_add'], $_POST['telefono_add'], $_POST['direccion_add'], $_POST['nombre_add'], $claveE);
            if($stmt=="Ok"){
                $stmt = $objCorreo->Correo($_POST['nombre_add'], $clave, $_POST['correo_add'],"Signup | Verification","Se le ha agregado para ser Asesor en G'NIUS,","Ha sido creada una cuenta a nombre de este correo, puedes iniciar sesion usando el siguiente código como contraseña:","Recuerda que luego podrás cambiar la contraseña.");
                echo json_encode($stmt);
            }else{
                echo json_encode($stmt);
            }
            break;
        default:
            header('location:?path=Asesor&c=Asesores&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=Asesores&a=inicio');
}


?>