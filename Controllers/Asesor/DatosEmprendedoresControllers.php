<?php
verRol('Asesor');
include_once("Models/Asesor/DatosEmprendedoresModel.php");
if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new DatosEmprendedores();
    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Emprendedores - Formulario";
            require_once "Views/Asesor/Datos/Emprendedores.php";
            break;
        case 'consultar':
            if($_POST){
                echo json_encode($obj->Consultar());
            }else{
                header('location:?path=Asesor&c=DatosEmprendedores&a=inicio');
            }
            break;
        case 'obtener':
            //$_POST['id'] = '2';
            if($_POST){
                echo json_encode($obj->Obtener($_POST['id']));
            }else{
                header('location:?path=Asesor&c=DatosEmprendedores&a=inicio');
            }
            break;
        case 'contar':
            if($_POST){
                echo json_encode($obj->Contar());
            }else{
                header('location:?path=Asesor&c=Principal&a=inicio');
            }
            break;
        case 'reporte':
            $stmt = $obj->Reporte();
            require_once "Views/Asesor/Datos/ReporteEmprendedores.php";
            break;
        default:
            header('location:?path=Asesor&c=DatosEmprendedores&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=DatosEmprendedores&a=inicio');
}


?>