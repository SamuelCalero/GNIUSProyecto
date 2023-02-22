<?php 
verRol('Emprendedor');
include_once("Models/Emprendedor/FormularioModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Formulario();
    switch ($_GET['a']) {
        case 'inicio':
            require_once "Views/Emprendedor/Formulario/formulario.php";
            break;
        case 'guardar':
            if($_POST){
                $id_asesor = $obj->idAsesor();
                if($id_asesor > 0){
                    $stmt = $obj->guardar_frm($_SESSION['id'], $id_asesor,$_POST['nombre_empresa'], $_POST['direccion_empresa'], $_POST['telefono_empresa'], $_POST['correo_empresa'], $_POST['rubro'],$_POST['vinculo'], 
                        $_POST['descripcion'], $_POST['perfil'], $_POST['titulo'], $_POST['planteamiento'], $_POST['antecedentes'], $_POST['delimitacion'], $_POST['justificacion'],
                        $_POST['objetivos'], $_POST['metodologia'], $_POST['cronograma'], $_POST['datos_integrantes'], $_POST['apoyo']);
                    if($stmt!="Error"){
                        $IdFrm = $stmt['IdFrm'];
                        $errores = 0;
                        $contador = $_POST['cont-integrantes'];
                        if($contador >= 0){
                            for ($i=0; $i <=$contador ; $i++) { 
                                if(isset($_POST['nombreintegrante'.$i]) && (isset($_POST['telefonoIntegrante'.$i])) && (isset($_POST['correoIntegrante'.$i])) && (isset($_POST['direccionIntegrante'.$i])) ){
                                    $resp = $obj->guardar_integrantes($IdFrm, $_SESSION['id'], $id_asesor, $_POST['nombreintegrante'.$i],$_POST['direccionIntegrante'.$i],$_POST['telefonoIntegrante'.$i],$_POST['correoIntegrante'.$i]);
                                    if ($resp!="Ok") {
                                        $errores++;
                                    }
                                }else{
                                    $errores++;
                                }
                            }
                        }else{
                            $errores++;
                        }
                            
                        $resp = $obj->guardar_empresa($_SESSION['id'], $IdFrm,  $id_asesor, $_POST['nombre_empresa'], $_POST['rubro']);
                        if ($resp!="Ok") {
                            $errores++;
                        }

                        if ($errores>=1) {
                            echo json_encode('Error');
                        }else{
                            echo json_encode('ok');
                        }
                    }else{
                        echo json_encode($stmt);
                    }
                }else{
                    echo json_encode($stmt);
                }
            }
            break;
        default:
            header('location:?path=Emprendedor&c=Formulario&a=inicio');
            break;
    }
}else{
    header('location:?path=Emprendedor&c=Formulario&a=inicio');
}



?>