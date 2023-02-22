<?php 

class Principal{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

	public function consultar($id){
        
        $sql = "SELECT * from citas where id_emprendedor='$id'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);

		if ($existe>0){

            $sql = "SELECT * from citas where id_emprendedor='$id' AND estado = 'Realizada'";
            $consulta = $this->db->query($sql);
            $existe=mysqli_num_rows($consulta);
            if ($existe>0){
                $sql = "SELECT * from formulario where id_emprendedor='$id'";
                $consulta = $this->db->query($sql);
                $existe=mysqli_num_rows($consulta);
                if ($existe>0){
                    return "SiFrm";
                } else {
                    return "NoFrm";
                }

            } else {
                return "NoCitaR";
            }

		} else {
			return "NoCita";
		}
    }

    public function idAsesor($id)
    {
        //$id = $_SESSION['id'];
        $sql = "SELECT id_asesor as id_asesor FROM emprendedor WHERE id_emprendedor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            $idAsesor = $stmt['id_asesor'];
            $sql = "SELECT nombre_foto as nomFoto FROM asesor WHERE id_asesor = '$idAsesor'";
            $stmt=$this->db->query($sql)->fetch_assoc();
            if($stmt){
                $nomFoto = $stmt['nomFoto'];
                if($nomFoto == null){
                    return "No";
                }else{
                    return $idAsesor;
                }
            }else{
                return "Error";
            }
        }else{
            return "Error";
        }
    }

    public function Foto($id){
        //$id = $_SESSION['id'];
        $sql = "SELECT * FROM asesor where id_asesor = '$id'";
        $stmt=$this->db->query($sql);
       	return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function datos_asesor($id){
        $sql = "SELECT id_asesor as id_asesor FROM emprendedor WHERE id_emprendedor = '$id'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            $idAsesor = $stmt['id_asesor'];
            $sql = "SELECT nombre, correo, telefono FROM asesor WHERE id_asesor = '$idAsesor'";
            $stmt=$this->db->query($sql);
            if($stmt){
                return $stmt->fetch_all(MYSQLI_ASSOC);
            }else{
                return "Error";
            }
        }else{
            return "Error";
        }
    }
	
}





?>