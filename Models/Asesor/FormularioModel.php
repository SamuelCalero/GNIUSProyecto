<?php

class Formulario{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function Consultar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM formulario WHERE Estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Contar()
    {
        $id = $_SESSION['id'];
        $sql ="SELECT count(id_formulario) as 'cantidad' FROM formulario WHERE estado = 'Visible' AND id_asesor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        return $stmt;
    }

    public function Obtener($id)
    {
        $sql ="SELECT * FROM formulario where id_formulario = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Cantidad($id)
    {
        $sql ="SELECT count(id_formulario) as 'contador' FROM datos_emprendedor WHERE id_formulario = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        return $stmt;
    }

    public function Datos($id)
    {
        $sql ="SELECT * FROM datos_emprendedor WHERE id_formulario = '$id'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function Eliminar($id)
    {
        $sql ="UPDATE formulario set Estado = 'Oculto' WHERE id_formulario='$id'";
        $stmt= $this->db->query($sql);
        if($stmt==1){
            $sql ="UPDATE datos_emprendedor set Estado = 'Oculto' WHERE id_formulario='$id'";
            $stmt= $this->db->query($sql);
            if($stmt==1){
                $sql ="UPDATE empresas set Estado = 'Oculto' WHERE id_formulario='$id'";
                $stmt= $this->db->query($sql);
                if($stmt==1){
                    return "Ok";
                }else{
                    return "Error";
                }
            }else{
                return "Error";
            }
        }else{
            return "Error";
        }
    }

    public function Existe($idFrm){
        $id = $_SESSION['id'];
        $sql="SELECT * from formulario WHERE Estado = 'Visible' AND id_asesor = '$id' AND id_formulario = '$idFrm'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);
		if ($existe>0)
		{
            return "Existe";
        }else{
            return "No";
        }
    }

    public function Reporte($idFrm)
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM formulario WHERE Estado = 'Visible' AND id_asesor = '$id' AND id_formulario = '$idFrm'";
        $stmt=$this->db->query($sql);
        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
    }

    public function ReporteEmp($idFrm)
    {
        $id = $_SESSION['id'];
        $sql ="SELECT * FROM datos_emprendedor WHERE estado = 'Visible' AND id_asesor = '$id' AND id_formulario = '$idFrm'";
        $stmt=$this->db->query($sql);
        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
    }

}