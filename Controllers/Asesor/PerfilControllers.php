<?php
verRol('Asesor');
include_once("Models/Asesor/PerfilModel.php");
include_once("Models/Publico/PasswordModel.php");

if(isset($_GET['a']) && ($_GET['a'] != "")){
    $obj = new Perfil();
    $objClave = new Claves();
    switch ($_GET['a']) {
        case 'foto':
            $stmt = $obj->NomFoto();
            if($stmt == "Si"){
                $stmt = $obj->Foto();
                foreach ($stmt as $row){
                    echo '"data:image/png;base64,'.base64_encode($row['foto']).'"';
                }
            }else{
                echo json_encode($stmt);;
            }
            break;
        case 'consultar':
            if($_POST){
                echo json_encode($obj->Consultar());
            }else{
                header('location:?path=Asesor&c=principal&a=inicio');
            }
            break;
        case 'consultar2':
            $stmt = $obj->Consultar2();
            if($stmt!="Error"){
                $clave = $objClave->decryption($stmt);
                echo json_encode($clave);
            }else{
                echo json_encode($stmt);
            }
            break;
        case 'guardar':
            if($_POST){

                $clave = $objClave->encryption($_POST['clave_usuario']);
                $_SESSION['nombre'] = $_POST['nombre_usuario'];

                if (empty($_FILES['imagen'])) {
                    $res = $obj->Guardar($_POST['nombre_usuario'], $clave, $_POST['telefono_usuario'], $_POST['direccion_usuario']);
                    echo json_encode ($res);
                }else{
                    $nombreArchivo = $_FILES['imagen']['name'];
                    $tipoArchivo = $_FILES['imagen']['type'];

                    $logitudPass = 12;
                    $imgNom = substr(md5(microtime()), 1, $logitudPass);
                    $explode = explode('.', $nombreArchivo);
                    $extension = array_pop($explode);
                    $imgNom = 'img-'.$imgNom.'.'.$extension;
                    
                    
                    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                        $img = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        $res = $obj->GuardarImg($img, $_POST['nombre_usuario'], $clave, $_POST['telefono_usuario'], $_POST['direccion_usuario'], $tipoArchivo, $imgNom);

                        echo json_encode ($res);
                    }
                }
            }else{
                header('location:?path=Asesor&c=principal&a=inicio');
            }
            break;
        default:
            header('location:?path=Asesor&c=principal&a=inicio');
            break;
    }
}else{
    header('location:?path=Asesor&c=principal&a=inicio');
}


?>