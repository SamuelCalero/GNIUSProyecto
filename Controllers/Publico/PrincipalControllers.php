<?php 
if(isset($_SESSION['rol'])){
    header("location: ?path=".$_SESSION['rol']."&c=Principal&a=inicio");
}else{
    if(isset($_GET['a']) && ($_GET['a'] != "")){
        switch ($_GET['a']) {
            case 'inicio':
                require_once "Views/Publico/inicio.php";
                break;
            default:
                header('location:?path=Publico&c=Principal&a=inicio');
                break;
        }
    }else{
        header('location:?path=Publico&c=Principal&a=inicio');
    }
}


?>