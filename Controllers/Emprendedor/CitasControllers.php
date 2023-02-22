<?php 
verRol('Emprendedor');
include_once("Models/Emprendedor/CitasModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Citas();
    switch ($_GET['a']) {
        case 'inicio':
            require_once "Views/Emprendedor/Citas/citas.php";
            break;
        case 'fecha':
            if($_POST){
                $fecha = $_POST['fecha'];
                date_default_timezone_set("America/El_Salvador");
                $hoy = date('Y-m-d');
                $fecha1 = date_create($hoy);
                $fecha2 = date_create($fecha);
                $diferencia = date_diff($fecha1, $fecha2);
                $d = $diferencia->format("%R%a");
                $dia  = date('D',strtotime($hoy));
                $stmt = "";
                switch ($dia) {
                    case 'Sun': case 'Mon': case 'Tue':
                        if($d >= 1 && $d<=3){$stmt = "si";}else{$stmt = "no";}
                        break;
                    case 'Wed': case 'Thu': case 'Fri':
                        if($d >= 1 && $d<=5){$stmt = "si";}else{$stmt = "no";}
                        break;
                    case 'Sat':
                        if($d >= 1 && $d<=4){$stmt = "si";}else{$stmt = "no";}
                        break;
                    default:
                        break;
                }
                if($stmt == "si"){
                    $hora = date('H:i',strtotime($fecha));
                    switch ($hora) {
                        case '09:00': case '09:30': case '10:00': case '10:30': case '11:00': case '14:00': case '14:30': case '15:00': case '15:30': case '16:00':
                        $stmt = "ok";
                            break;
                        default:
                        $stmt = "Hora no permitida";
                            break;
                    }
                }else{
                    $stmt = "Fecha no permitida";
                }
                echo json_encode($stmt);
            }else{
                header('location:?path=Emprendedor&c=Citas&a=inicio');
            }
            break;
        case 'guardar':
            if($_POST){
                $stmt = $obj->guardar_cita($_POST['nombres'], $_SESSION['correo'], $_POST['telefono'], $_POST['fecha']);
                echo json_encode($stmt);
            }else{
                header('location:?path=Emprendedor&c=Citas&a=inicio');
            }
            break;
        default:
            header('location:?path=Emprendedor&c=Citas&a=inicio');
            break;
    }
}else{
    header('location:?path=Emprendedor&c=Citas&a=inicio');
}

?>