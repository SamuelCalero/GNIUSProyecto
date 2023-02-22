<?php 
verRol('Emprendedor');
include_once("Models/Emprendedor/PrincipalModel.php");
if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Principal();
    switch ($_GET['a']) {
        case 'inicio':
            require_once "Views/Emprendedor/inicio.php";
            break;
        case 'consultar':
            $stmt = $obj->consultar($_SESSION['id']);
            echo json_encode($stmt);
            break;
        case 'foto':
            $stmt = $obj->idAsesor($_POST['id']);
            if($stmt != "No" && $stmt != "Error"){
                $idAsesor = $stmt;
                $data = $obj->Foto($idAsesor);
                foreach ($data as $row){
                    echo '"data:image/png;base64,'.base64_encode($row['foto']).'"';
                }
            }else{
                echo json_encode($stmt);
            }
            break; 
        case 'datos':
            if($_POST){
                echo json_encode($obj->datos_asesor($_POST['id']));
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