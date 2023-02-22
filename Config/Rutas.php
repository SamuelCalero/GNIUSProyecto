<?php 

function sesionIniciada(){
    if(isset($_SESSION['rol'])){
        header("location: ?path=".$_SESSION['rol']."&c=Principal&a=inicio");
    }else{
        header("location: ?path=Publico&c=Principal&a=inicio");
    }
}

function cargarInicio($id, $nombre, $correo, $rol){
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['rol']=$rol;
    $_SESSION['nombre']=$nombre;
    $_SESSION['correo']=$correo;

    if($rol=="Emprendedor"){
        header("location: ?path=Emprendedor&c=Principal&a=inicio");
    }elseif($rol=="Asesor"){
        header("location: ?path=Asesor&c=Principal&a=inicio");
    }else{
        header("location: ?path=Publico&c=login&a=cerrarsesion");
    }
}

function verRol($rol){
    if($rol != $_SESSION['rol']){
       header('Location: ?path='.$_SESSION['rol'].'&c=Principal&a=inicio');
    }
}

?>