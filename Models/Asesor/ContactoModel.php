<?php

class Contacto{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function Consultar($id)
    {
        $sql ="SELECT * FROM contacto where estado='Visible' AND id_asesor='$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Contar($id)
    {
        $sql ="SELECT count(id_contacto) as 'cantidad' FROM contacto where estado='Visible' AND id_asesor='$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt;
        }else{
            return "Error";
        }
    }

    public function Obtener($id)
    {
        $sql ="SELECT * FROM contacto where id_contacto='$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Responder($id,$correo,$respuesta){
        $sql ="UPDATE contacto set estado='Oculto', respuesta='.$respuesta.' where id_contacto='$id' ";
        $stmt=$this->db->query($sql);
        if($stmt==1){
            return "Ok";
        }else{
            return "Error";
        }
    }
}