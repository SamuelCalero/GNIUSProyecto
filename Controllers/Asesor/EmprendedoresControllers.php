<?php
verRol('Asesor');
include_once("Models/Asesor/EmprendedoresModel.php");
if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Emprendedores();
    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Emprendedores";
            require_once "Views/Asesor/Emprendedores/Emprendedores.php";
            break;
        case 'consultar':
            if($_POST){
                echo json_encode($obj->Consultar());
            }else{
                header('location:?path=Asesor&c=Emprendedores&a=inicio');
            }
            break;
        case 'contar':
            if($_POST){
                echo json_encode($obj->Contar());
            }else{
                header('location:?path=Asesor&c=Emprendedores&a=inicio');
            }
            break;
        case 'obtener':
            if($_POST){
                echo json_encode($obj->Obtener($_POST['id']));
            }else{
                header('location:?path=Asesor&c=Emprendedores&a=inicio');
            }
            break;
        case 'eliminar':
            if($_POST){
                $stmt = $obj->Eliminar($_POST['id']);
                echo json_encode($stmt);
            }else{
                header('location:?path=Asesor&c=Emprendedores&a=inicio');
            }
            break;
        default:
            header('location:?path=Asesor&c=Emprendedores&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=Emprendedores&a=inicio');
}


?>