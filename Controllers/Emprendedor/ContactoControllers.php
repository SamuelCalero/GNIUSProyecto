<?php 
verRol('Emprendedor');
include_once("Models/Emprendedor/ContactoModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){

    switch ($_GET['a']) {
        case 'guardar':
            if($_POST){
                $obj = new Contacto();
                $stmt = $obj->guardar($_POST['email'], $_POST['mensaje']);
                echo json_encode($stmt);
            }else{
                header('location:?path=Emprendedor&c=Principal&a=inicio');
            }
            break;
        default:
            header('location:?path=Emprendedor&c=Principal&a=inicio');
            break;
    }
}else{
    header('location:?path=Emprendedor&c=Principal&a=inicio');
}

?>