<?php
include_once("Models/Publico/ClaveModel.php");
include_once("Models/Publico/PasswordModel.php");
include_once("Models/Publico/CorreoModel.php");
if(isset($_SESSION['rol'])){
    header("location: ?path=".$_SESSION['rol']."&c=Principal&a=inicio");
}else{
    $objClave = new Claves();
    $objCorreo = new Correo();
    $obj = new Clave();
    if(isset($_GET['a']) && ($_GET['a'] != "")){
        switch ($_GET['a']) {
            case 'inicio':
                require_once "Views/Publico/Clave/clave.php";
                break;
            case 'actualizar':
                if($_POST){
                    if(($_POST['username'] != '') && ($_POST['email'] !='') && ($_POST['clave1'] == $_POST['clave2'])){
                        $hashE =  $objClave->encryption($_POST['codigo']);
                        $clave =  $objClave->encryption($_POST['clave1']);
                        $stmt = $obj->actualizar($_POST['username'], $_POST['email'], $clave, $hashE);
                        echo json_encode($stmt);
                    }else{
                        echo json_encode("-");
                    }
                }else{
                    header('location:?path=Publico&c=Cambiarclave&a=inicio');
                }
                break;
            case 'cambiar':
                if($_POST){
                    $hash = rand(100, 99999);
                    $hashE =  $objClave->encryption($hash);
                    $stmt = $obj->cambiar($_POST['username'],$_POST['email'],$hashE);
                    if($stmt=="Ok"){
                        $stmt = $objCorreo->Correo("", $hash, $_POST['email'],"Cambio de contraseña","Estimado usuario","El cambio de contraseña está en proceso, usa el siguiente código para continuar:","Si no fuiste tú, ponte en contacto con un asesor, pueda que tu cuenta esté en peligro.");
                        echo json_encode($stmt);
                    }else{
                        echo json_encode($stmt);
                    }
                    //echo json_encode($stmt);
                }else{
                    header('location:?path=Publico&c=Cambiarclave&a=inicio');
                }
                break;
            default:
                header('location:?path=Publico&c=Cambiarclave&a=inicio');
                break;
        }
    }else{
        header('location:?path=Publico&c=Cambiarclave&a=inicio');
    }
}

?>