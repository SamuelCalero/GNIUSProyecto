<?php 
include_once("Models/Publico/LoginModel.php");
include_once("Models/Publico/PasswordModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){

    switch ($_GET['a']) {

        case 'ingresar':
            if($_POST['correo']!='' && $_POST['clave']!=''){
                $obj = new Login();
                $objClave = new Claves();
                $clave = $objClave->encryption($_POST['clave']);
                $stmt = $obj->ingresar($_POST['correo'],$clave);
                echo json_encode($stmt);
            }
            break;
        case "iniciarsesion":
            if($_POST){
                cargarInicio($_POST['id'],$_POST['nombre'],$_POST['correo'],$_POST['rol']);
            }else{
                header('location:?path=Publico&c=Principal&a=inicio');
            }
            break;
        case 'cerrarsesion':
            session_start();
            session_destroy();
            header('location:?path=Publico&c=Principal&a=inicio');
            break;
        case 'varSesion':
            if($_POST && $_SESSION['correoV']){
                unset($_SESSION['correoV']);
                echo json_encode("abrir");
            }else{
                header('location:?path=Publico&c=Principal&a=inicio');
            }
            break;
        default:
            header('location:?path=Publico&c=Principal&a=inicio');
            break;
    }
}else{
    header('location:?path=Publico&c=Principal&a=inicio');
}



?>