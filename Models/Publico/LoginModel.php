<?php 

class Login{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

	public function ingresar($correo,$clave){

        $sql="SELECT *, id_emprendedor as id, 'Emprendedor' as rol from emprendedor where correo='$correo' and clave='$clave' and estado='Activo'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);
		if ($existe>0)
		{
			$rows=mysqli_fetch_array($consulta);
			return $rows;
		}else{
			$sql2="SELECT correo as correo, nombre as nombre, id_asesor as id, 'Asesor' as rol from asesor where correo='$correo' and clave='$clave' and estado='Activo'";
			$consulta2 = $this->db->query($sql2);
			$existe2=mysqli_num_rows($consulta2);
			if ($existe2>0)
			{
				$rows2=mysqli_fetch_array($consulta2);
				return $rows2;
			}else{
				return "NoData";
			}
		}


    }
	
}





?>