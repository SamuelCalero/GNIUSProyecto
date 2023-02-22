<?php
verRol('Asesor');
include_once("Models/Asesor/CitasModel.php");
include_once("Models/Publico/CorreoModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){
    $objCorreo = new Correo();
    $obj = new Citas();
    switch ($_GET['a']) {
        case 'inicio':
            $titulo = "Citas agendadas";
            require_once "Views/Asesor/Citas/citas.php";
            break;
        case 'Listar':
            $stmt = $obj->Listar();
            echo json_encode($stmt);
            break;
        case 'obtener':
            $stmt = $obj->obtener($_POST['id']);
            echo json_encode($stmt);
            break; 
        case 'Registrar':
            $fecha = $_POST['start'];//EL POST
            $dia  = date('D',strtotime($fecha));
            $stmt = "";
            if($dia == "Sun" || $dia == "Sat"){
                echo json_encode("No se permiten agendar en Sábado o Domingo");
            }else{
                $date = date('d/m/Y', strtotime($fecha));
                $time = date('H:i', strtotime($fecha));
                $d = $obj->fecha($fecha);
                if($d<=0){
                    if($_POST['resp']=="Realizada"){
                        $stmt = $obj->confirmar($_POST['codigo'], $_POST['resp']);
                        if($stmt == "Ok"){
                            $stmt = $objCorreo->Correo($_POST['nombres'], '', $_POST['email'],"Seguimiento de proceso de G'NIUS","Estimado Usuario,","Gracias por agendar una cita con nosotros. <br>Te informamos que ya puedes dar continuidad al siguiente paso para ser parte de G'NIUS, recuerda que el siguiente paso es el llenado del formulario ","");
                            echo json_encode($stmt);
                        }else{
                            echo json_encode($stmt);
                        }
                    }else if($_POST['resp']=='Incumplida'){
                        $stmt = $obj->confirmar($_POST['codigo'], $_POST['resp']);
                        if($stmt=="Ok"){
                            echo json_encode("Exito");
                        }else{
                            echo json_encode($stmt);
                        }
                    }else{
                        echo json_encode("No se puede realizar los cambios, fecha incorrecta");
                    }
                }else{
                    if ($_POST['codigo'] == '') {
                        $stmt = $obj->registrar($_POST['nombres'],$_POST['email'],$_POST['telefono'],$_POST['title'], $_POST['start'], $_POST['color']);
                        if($stmt=="Ok"){
                            $stmt = $objCorreo->Correo($_POST['nombres'], $date.' '.$time, $_POST['email'],"Fecha Entrevista","Estimado Usuario,","Te informamos que se ha agendado una entrevista de parte de G'NIUS para el día: ","");
                            echo json_encode($stmt);
                        }else{
                            echo json_encode($stmt);
                        }
                    } else {
                        if($_POST['resp']=='Nulo'){
                            $stmt = $obj->modificar($_POST['title'], $_POST['start'], $_POST['color'], $_POST['codigo']);
                            if($stmt=="Ok"){
                                $stmt = $objCorreo->Correo($_POST['nombres'], $date.' '.$time, $_POST['email'],"Modificacion de fecha a su Reunión","Estimado Usuario,","Gracias por agendar una cita con nosotros. <br>Te informamos que su cita ha sido reagendada para el día: ","");
                                echo json_encode($stmt);
                            }else{
                                echo json_encode($stmt);
                            }
                        }else{
                            echo json_encode("Error");
                        }
                    }
                }
            }
            break;
        case 'Drag':
            if (empty($_POST['id']) || empty($_POST['start'])) {
                echo json_encode('ErrorDatos');
            }else{
                $fecha = $_POST['start'];//EL POST
                $dia  = date('D',strtotime($fecha));
                
                if($dia == "Sun" || $dia == "Sat"){
                    echo json_encode("No se permiten agendar en Sábado o Domingo");
                }else{
                    $date = date('d/m/Y', strtotime($fecha));
                    $time = date('H:i', strtotime($fecha));
                    $d = $obj->fecha($fecha);
                    if($d<=0){
                        echo json_encode("No se puede realizar los cambios, fecha incorrecta");
                    }else{
                        $date = date('d/m/Y', strtotime($fecha));
                        $time = date('H:i', strtotime($fecha));
                        $stmt = $obj->dragOver($_POST['start'], $_POST['id']);
                        if($stmt!="Error" && $stmt!="Error, la reunión fue realizada"){
                            $correo = $stmt;
                            $stmt = $objCorreo->Correo('', $date.' '.$time, $correo,"Modificacion de fecha a su Reunión","Estimado Usuario,","Gracias por agendar una reunión con nosotros. <br>Te informamos que su cita ha sido reagendada para el día: ","");
                            echo json_encode($stmt);
                        }else{
                            echo json_encode($stmt);
                        }
                    }
                }
            }
            break;
        default:
            header('location:?path=Asesor&c=Citas&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=Citas&a=inicio');
}


?>