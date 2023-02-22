<?php

class Asesores{
    private $db; 

    public function __construct()
    {
        $this->db = conectar::conexion();
    }
     
    public function Consultar()
    {
        $sql ="SELECT id_asesor, nombre, correo, telefono, direccion FROM asesor WHERE Estado = 'Activo'";
        $stmt=$this->db->query($sql);
        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
       
    }

    public function Contar()
    {
        $sql ="SELECT count(id_asesor) as 'cantidad' FROM asesor WHERE estado = 'Activo'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt;
        }else{
            return "Error";
        }
    }

    public function Obtener($id)
    {
        $sql ="SELECT id_asesor, nombre, correo, telefono, direccion FROM asesor where id_asesor = '$id'";
        $stmt=$this->db->query($sql);
        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
    }

    public function Eliminar($id)
    {
        $sql ="UPDATE asesor set Estado = 'Inactivo' WHERE id_asesor='$id'";
        $stmt= $this->db->query($sql);
        if($stmt==1){
            return "Ok";
        }else{
            return "Error";
        }
    }

    public function Guardar($correo, $telefono, $direccion, $nombre, $clave){
        $sql="SELECT correo from asesor where correo='$correo'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);
        if ($existe>0)
		{
			return "Existe";
		}else{
            $sql="SELECT correo from emprendedor where correo='$correo'";
            $consulta = $this->db->query($sql);
            $existe=mysqli_num_rows($consulta);
            if ($existe>0)
            {
                return "Existe";
            }else{
                $sql ="INSERT INTO asesor(nombre, correo, telefono, direccion, clave)
                VALUES('$nombre','$correo', '$telefono', '$direccion', '$clave')";
                $stmt = $this->db->query($sql);
                if($stmt){
                    return "Ok";
                }else{
                    return "Error";
                }
            }
        }
    }

    //alter table nombre_de_la_tabla AUTO_INCREMENT=1
}