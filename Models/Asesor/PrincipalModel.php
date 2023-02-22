<?php

class Principal{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     

    public function cont_Emp()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_asesor) as 'cantidad' FROM emprendedor WHERE estado = 'Activo' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt;
        }else{
            return "Error";
        }
    }

    public function cont_pre()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_asesor) as 'cantidad' FROM contacto WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt;
        }else{
            return "Error";
        }
    }

    public function cont_reuniones()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_asesor) as 'cantidad' FROM citas WHERE id_asesor = '$id' AND estado = 'Agendada' OR estado = 'Entrevista'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt;
        }else{
            return "Error";
        }
    }

}