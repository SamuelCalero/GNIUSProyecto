<?php 

session_start();
require_once "Config/Rutas.php";
require_once "Config/Conexion.php";

if(isset($_GET['c']) ){   
    if(file_exists("Controllers/".$_GET['path']."/".$_GET['c']."Controllers.php")){
        require_once("Controllers/".$_GET['path']."/".$_GET['c']."Controllers.php");
    }else{
        sesionIniciada();
    }

}else{
    sesionIniciada();
}

?>