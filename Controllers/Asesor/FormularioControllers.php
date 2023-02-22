<?php
verRol('Asesor');
include_once("Models/Asesor/FormularioModel.php");
if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Formulario();
    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Formulario";
            require_once "Views/Asesor/Formulario/formulario.php";
            break;
        case 'consultar':
            if($_POST){
                echo json_encode($obj->Consultar());
            }else{
                header('location:?path=Asesor&c=Principal&a=inicio');
            }
            break;
        case 'contar':
            if($_POST){
                echo json_encode($obj->Contar());
            }else{
                header('location:?path=Asesor&c=Principal&a=inicio');
            }
            break;
        case 'obtener':
            if($_POST){
                echo json_encode($obj->Obtener($_POST['id']));
            }else{
                header('location:?path=Asesor&c=Formulario&a=inicio');
            }
            break;
        case 'cantidad':
            if($_POST){
                echo json_encode($obj->Cantidad($_POST['id']));
            }else{
                header('location:?path=Asesor&c=Formulario&a=inicio');
            }
            break;
        case 'datos':
            if($_POST){
                echo json_encode($obj->Datos($_POST['id']));
            }else{
                header('location:?path=Asesor&c=Formulario&a=inicio');
            }
            break;
        case 'eliminar':
            if($_POST){
                $stmt = $obj->Eliminar($_POST['id']);
                echo json_encode($stmt);
            }else{
                header('location:?path=Asesor&c=Formulario&a=inicio');
            }
            break;
        case 'reporte':
            //$_POST['id'];
            $res = $obj->Existe($_GET['id']);
            if($res=="Existe"){
                $stmt = $obj->Reporte($_GET['id']);
                $data = $obj->ReporteEmp($_GET['id']);
                if($stmt!="Error" && $data!="Error"){
                    require_once "Views/Asesor/Formulario/ReporteFormulario.php";
                }else{
                    header('location:?path=Asesor&c=Formulario&a=inicio');
                }
            }else{
                header('location:?path=Asesor&c=Formulario&a=inicio');
            }
            break;
        default:
            header('location:?path=Asesor&c=Formulario&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=Formulario&a=inicio');
}


?>