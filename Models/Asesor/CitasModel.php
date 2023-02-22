<?php
class Citas{
    public function __construct()
    {
        $this->db = conectar::conexion();
    }
    public function Listar()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT *, id_citas as id, titulo as title, fecha as start FROM citas WHERE id_asesor = '$id'";
        $stmt = $this->db->query($sql);

        if($stmt){
            return $stmt->fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }

    }
    public function obtener($id)
    {
        $sql = "SELECT *, DATE_FORMAT(fecha, '%Y/%m/%d %H:%i') as fecha FROM citas WHERE id_citas = '$id'";
        $stmt = $this->db->query($sql);
        if($stmt){
            return $stmt -> fetch_all(MYSQLI_ASSOC);
        }else{
            return "Error";
        }
        
    }

    public function registrar($nombres, $email,$telefono, $title, $start, $color)
    {
        $idA=$_SESSION['id'];
        $sql = "SELECT id_emprendedor as id_emp FROM emprendedor where correo='$email' AND id_asesor = '$idA'";
        $stmt=$this->db->query($sql)->fetch_assoc();

        if ($stmt) {
            $id_emp = $stmt["id_emp"];

            $sql = "INSERT INTO citas (id_asesor, id_emprendedor,nombres, email, telefono, titulo, fecha, color, estado)
                    VALUES ('$idA','$id_emp','$nombres','$email','$telefono','$title','$start','$color', 'Entrevista')";
            $stmt=$this->db->query($sql);
            if ($stmt) {
               return 'Ok';
            }else{
                return 'Error';
            }
        }else{
            return 'Error';
        }
        
    }
    public function confirmar($id, $estado)//realizado o incumplido
    {
        $idA=$_SESSION['id'];
        $sql="SELECT email from citas where id_citas='$id' AND estado = 'Agendada' AND id_asesor = '$idA'";
		$consulta = $this->db->query($sql);
		$existe=mysqli_num_rows($consulta);
        if ($existe>0)
		{
            $sql = "UPDATE citas SET estado='$estado' WHERE id_citas='$id'";
            $stmt=$this->db->query($sql);
            if($stmt==1){
                return "Ok";
            }else{
                return "Error";
            }
            
		}else{
            return "Error";
        }
        /**/
    }
    public function modificar($title, $start, $color, $id)
    {
        $sql = "SELECT email as correo FROM citas where id_citas='$id' AND estado = 'Entrevista' OR estado = 'Agendada'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            $sql = "UPDATE citas SET titulo='$title', fecha='$start', color='$color' WHERE id_citas='$id'";
            $stmt=$this->db->query($sql);
            if($stmt==1){
                return "Ok";
            }else{
                return "Error";
            }
        }else{
            return "Error, la reunión fue realizada";
        }
        
    }
    public function DragOver($start, $id)
    {
        $sql = "SELECT email as correo FROM citas where id_citas='$id' AND estado = 'Entrevista' OR estado = 'Agendada'";
        $stmt=$this->db->query($sql)->fetch_assoc();
        if($stmt){
            $correo = $stmt["correo"];
            $sql = "UPDATE citas SET  fecha='$start' WHERE id_citas='$id'";
            $stmt=$this->db->query($sql);
            if($stmt==1){
                return $correo;
            }else{
                return "Error";
            }
        }else{
            return "Error, la reunión fue realizada";
        }
    }

    public function fecha($fecha){
        date_default_timezone_set("America/El_Salvador");
        $hoy = date('Y-m-d');
        $fecha1 = date_create($hoy);
        $fecha2 = date_create($fecha);
        $diferencia = date_diff($fecha1, $fecha2);
        $d = $diferencia->format("%R%a");
        return $d;
    }

}

?>