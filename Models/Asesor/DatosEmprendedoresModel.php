<?php

class DatosEmprendedores{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function Consultar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM datos_emprendedor WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Contar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_datoEmprendedor) as 'cantidad' FROM datos_emprendedor WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        return $stmt;
    }

    public function Obtener($id)
    {
        $sql ="SELECT * FROM datos_emprendedor where id_datoEmprendedor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Reporte()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM datos_emprendedor WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

}