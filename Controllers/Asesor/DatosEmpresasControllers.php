<?php
verRol('Asesor');
include_once("Models/Asesor/DatosEmpresasModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new DatosEmpresas();
    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Empresas - Formulario";
            require_once "Views/Asesor/Datos/Empresas.php";
            break;
        case 'obtener':
            //$_POST['id'] = '2';
            if($_POST){
                echo json_encode($obj->Obtener($_POST['id']));
            }else{
                header('location:?path=Asesor&c=DatosEmpresas&a=inicio');
            }
            break;
        case 'consultar':
            if($_POST){
                echo json_encode($obj->Consultar());
            }else{
                header('location:?path=Asesor&c=DatosEmpresas&a=inicio');
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
            require_once "Views/Asesor/Datos/ReporteEmpresas.php";
            break;
        default:
            header('location:?path=Asesor&c=DatosEmpresas&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=DatosEmpresas&a=inicio');
}


?>