<?php 

class Clave{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
	
    public function cambiar($username,$email,$hash2){
		$sql = "SELECT * FROM emprendedor WHERE correo='$email' AND nombre='$username'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);	
        if ($existe>0){
			$sql = "UPDATE emprendedor set hash_ = '$hash2' WHERE correo='$email' AND nombre='$username'";
            $stmt = $this->db->query($sql);
			if ($stmt==1) {
				return "Ok";
			}else {
				return "Error";
			}
        } else {
            $sql = "SELECT correo FROM asesor WHERE correo='$email' AND nombre='$username'";
			$consulta = $this->db->query($sql);
			$existe=mysqli_num_rows($consulta);	
			if ($existe>0){
				$sql = "UPDATE asesor set hash_ = '$hash2' WHERE correo='$email' AND nombre='$username'";
				$stmt = $this->db->query($sql);
				if ($stmt==1) {
					return "Ok";
				}else {
					return "Error";
				}
			} else {
				return "No";
			}
        }
	}

    public function actualizar($username,$email,$clave,$hash2){
        $sql = "SELECT * FROM emprendedor WHERE correo='$email' AND nombre='$username' AND estado = 'Activo'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);
		if ($existe>0){
			$sql = "UPDATE emprendedor set clave='$clave', hash_ = ''  WHERE correo='$email' AND hash_='$hash2'";
			$stmt = $this->db->query($sql);
			if ($stmt==1){
                $_SESSION['correoV'] = $email;
				return "Ok";
			}else{
				return "Error";
			}
		} else {
			$sql = "SELECT correo FROM asesor WHERE correo='$email' AND nombre='$username' AND estado = 'Activo'";
			$consulta = $this->db->query($sql);
			$existe=mysqli_num_rows($consulta);
			if ($existe>0){
				$sql = "UPDATE asesor set clave='$clave', hash_ = ''  WHERE correo='$email' AND hash_='$hash2'";
				$stmt = $this->db->query($sql);
				if ($stmt==1){
					$_SESSION['correoV'] = $email;
					return "Ok";
				}else{
					return "Error";
				}
			} else {
				return "Error";
			}
		}
    }

}
?>