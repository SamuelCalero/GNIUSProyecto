<?php
class Citas{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

	public function guardar_cita($nombres, $email, $telefono, $fecha){
        $idE=$_SESSION['id'];
        $sql1 = "SELECT id_asesor as ID FROM emprendedor where id_emprendedor='$idE'";
        $stmt2 = $this->db->query($sql1)->fetch_assoc();
        $ID = $stmt2["ID"];
        $color = str_pad(dechex(Rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
        $sql = "INSERT INTO citas(id_asesor, id_emprendedor, nombres, telefono, email, fecha, color, estado) 
                VALUES('$ID', '$idE','$nombres', '$telefono', '$email', '$fecha', '#$color', 'Agendada')";
        $stmt = $this->db->query($sql);
        if($stmt){
             return "Ok";
        }else{
             return "Error";
        }
    }
}

?>