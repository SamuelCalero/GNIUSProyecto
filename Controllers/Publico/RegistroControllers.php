<?php 
include_once("Models/Publico/RegistroModel.php");
include_once("Models/Publico/PasswordModel.php");
include_once("Models/Publico/CorreoModel.php");

if(isset($_SESSION['rol'])){
    header("location: ?path=".$_SESSION['rol']."&c=Principal&a=inicio");
}else{

    $objClave = new Claves();
    $objCorreo = new Correo();
    $obj = new Registro();

    if(isset($_GET['a']) && ($_GET['a'] != "")){
        switch ($_GET['a']) {
            case 'inicio':
                require_once "Views/Publico/Registro/registro.php";
                break;
            case 'guardar':
                if($_POST){
                    if($_POST['clave1'] == $_POST['clave2']){
                        $hash = rand(100, 99999);
                        $hashE =  $objClave->encryption($hash);
                        $clave =  $objClave->encryption($_POST['clave1']);
                        $stmt = $obj->registro($_POST['username'],$_POST['email'],$clave,$_POST['telefono'], $hashE, $hash);
                        if($stmt=="Ok"){
                            $stmt = $objCorreo->Correo($_POST['username'], $hash, $_POST['email'],"Signup | Verification","Gracias por registrarte,","Tu cuenta ha sido creada con éxito, puedes activarla usando el siguiente código:","Si no fuiste tú, puedes ignorar este mensaje.");
                            echo json_encode($stmt);
                        }else{
                            echo json_encode($stmt);
                        }
                    }else{
                        header('location:?path=Publico&c=Registro&a=inicio');
                    }
                }else{
                    header('location:?path=Publico&c=Registro&a=inicio');
                }
                break;           
            case 'activar':
                if(isset($_SESSION['correoV'])){
                    require_once "Views/Publico/Registro/activar.php";
                }else{
                    header('location:?path=Publico&c=Registro&a=inicio');
                }
                break;   
            case 'activarcodigo':
                if($_POST && $_SESSION['correoV']){
                    $hashE =  $objClave->encryption($_POST['codigo']);
                    $stmt = $obj->activar($_POST['email'],$hashE);
                    echo json_encode($stmt);
                }else{
                    header('location:?path=Publico&c=Registro&a=inicio');
                }
                break;   
            default:
                header('location:?path=Publico&c=Registro&a=inicio');
                break;
        }
    }else{
        header('location:?path=Publico&c=Registro&a=inicio');
    }
}

?>