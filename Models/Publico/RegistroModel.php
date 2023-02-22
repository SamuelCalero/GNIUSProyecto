<?php 

class Registro{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
	
	public function registro($username,$email,$contraseña,$telefono, $hash_){
		$sql = "SELECT * FROM emprendedor WHERE correo='$email'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);	
        if ($existe>0){
            return "Existe";
        } else {
            $sql = "SELECT correo from asesor where correo='$email'";
			$consulta = $this->db->query($sql);
			$existe=mysqli_num_rows($consulta);	
			if ($existe>0){
				return "Existe";
			} else {
				$_SESSION['correoV'] = $email;
				$sqlasesor = "SELECT id_asesor as ID FROM asesor ORDER BY rand() LIMIT 1";
				$stmt2 = $this->db->query($sqlasesor)->fetch_assoc();
				$ID = $stmt2["ID"];
				if($stmt2){
					$sql = "INSERT INTO emprendedor (nombre, correo, clave, telefono, hash_, id_asesor) VALUES ('$username', '$email', '$contraseña', '$telefono','$hash_','$ID')";
					$stmt = $this->db->query($sql);
					if ($stmt) {
						return "Ok";
					}else {
						return "Error al momento de registrarse";
					}
				}else{
					return "Error";
				} 
			}
        }
		/*//$hash_ = rand(0, 9999);*/
	}

	public function activar($correo,$codigo){
		$sql = "select * from emprendedor where correo='$correo' AND hash_='$codigo'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);
		if ($existe>0){
			$sql = "UPDATE emprendedor set estado='Activo', hash_ = '' where correo='$correo' AND hash_='$codigo'";
			$stmt = $this->db->query($sql);
			if ($stmt==1){
				//unset($_SESSION['correoV']);
				return "Activado";
			}else{
				return "Inactivo";
			}
		} else {
			return "Error";
		}
	}
}
?>