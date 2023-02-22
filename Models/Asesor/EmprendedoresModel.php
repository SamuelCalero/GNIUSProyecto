<?php

class Emprendedores{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function Consultar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM emprendedor WHERE Estado = 'Activo' AND id_Asesor = '$id' ";
        $stmt=$this->db->query($sql);
        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
    }

    public function Contar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_emprendedor) as 'cantidad' FROM emprendedor WHERE Estado = 'Activo' AND id_Asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt;
        }else{
            return "Error";
        }
    }

    public function Obtener($id)
    {
        $sql ="SELECT * FROM emprendedor where id_emprendedor = '$id'";
        $stmt=$this->db->query($sql);
        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
    }

    public function Eliminar($id)
    {
        $sql ="UPDATE emprendedor set Estado = 'Inactivo' WHERE id_emprendedor='$id'";
        $stmt= $this->db->query($sql);
        if($stmt==1){
            return "Ok";
        }else{
            return "Error";
        }
    }

}