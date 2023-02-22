<?php

class Perfil{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function NomFoto()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT nombre_foto as nomFoto FROM asesor WHERE id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            $nomFoto = $stmt['nomFoto'];
            if($nomFoto == null){
                return "No";
            }else{
                return "Si";
            }
        }else{
            return "error";
        }
    }

    public function Foto(){
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM asesor where id_asesor = '$id'";
        $stmt=$this->db->query($sql);
       	return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Consultar(){
        $id = $_SESSION['id'];
        $sql ="SELECT nombre, correo, telefono, direccion FROM asesor where id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Consultar2(){
        $id = $_SESSION['id'];
        $sql ="SELECT clave as clave FROM asesor where id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt['clave'];
        }else{
            return "Error";
        }
    }

    public function Guardar($nombre, $clave, $telefono, $direccion){
        $id = $_SESSION['id'];
        $sql ="UPDATE asesor SET nombre = '$nombre', clave = '$clave', telefono = '$telefono', direccion = '$direccion' where id_asesor = '$id'";
        
        $stmt = $this->db->query($sql);
        if($stmt==1){
            return "Ok";
        }else{
            return "Error";
        }
    }

    public function GuardarImg($img, $nombre, $clave, $telefono, $direccion, $tipo_foto, $nombre_foto){
        $id = $_SESSION['id'];
        $sql ="UPDATE asesor SET foto = '$img', nombre = '$nombre', clave = '$clave', telefono = '$telefono', direccion = '$direccion', tipo_foto = '$tipo_foto', nombre_foto = '$nombre_foto' where id_asesor = '$id'";
        
        $stmt = $this->db->query($sql);
        if($stmt==1){
            return "Ok";
        }else{
            return "Error";
        }
    }


}