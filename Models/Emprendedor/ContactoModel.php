<?php
class Contacto{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

	public function guardar($email, $mensaje){
        $id = $_SESSION['id'];

        $sql = "SELECT id_asesor as idAsesor FROM emprendedor where id_emprendedor = '$id'";
		$stmt = $this->db->query($sql)->fetch_assoc();
		$idAsesor = $stmt["idAsesor"];
        
        if($stmt){
            $sql = "INSERT INTO contacto(id_emprendedor, id_asesor, correo, mensaje) 
                VALUES('$id', '$idAsesor', '$email', '$mensaje')";
            $stmt = $this->db->query($sql);
            if($stmt){
                return "Ok";
            }else{
                return "Error en enviar la respuesta";
            }
        }else{
            return "Error";
        }
    }
}

?>