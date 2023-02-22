<?php 
verRol('Asesor');
include_once("Models/Asesor/PrincipalModel.php");
if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Principal();
    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Inicio";
            require_once "Views/Asesor/inicio.php";
            break;
        case 'contEmp':
                echo json_encode($obj->cont_Emp());
            break;
        case 'contPre':
                echo json_encode($obj->cont_pre());
            break;
        case 'conReuniones':
                echo json_encode($obj->cont_reuniones());
            break;
        default:
            header('location:?path=Asesor&c=Principal&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=Principal&a=inicio');
}



?>