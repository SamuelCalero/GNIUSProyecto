<?php

class DatosEmpresas{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function Consultar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM empresas  WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Contar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_empresas) as 'cantidad' FROM empresas WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        return $stmt;
    }

    public function Obtener($id)
    {
        $sql ="SELECT * FROM empresas where id_empresas = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Reporte()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM empresas WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}