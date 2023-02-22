<?php 

class Formulario{
	private $db;

    public function __construct()
    {
        $this->db = conectar::conexion();
    }

	public function guardar_frm($id_emprendedor, $id_asesor, $nombre_empresa, $direccion, $telefono, $correo_empresa, $rubro, $vinculo_utec, $descripcion_emprendimiento, $perfil_investigacion, $titulo_investigacion,$planteamiento_problema, $antecedentes, $delimitacion, $justificacion, $objetivos, $metodologia, $cronograma, $datos_integrantes, $apoyo){
        try {
            $sql = "INSERT INTO formulario(id_emprendedor, id_asesor, nombre_empresa, direccion, telefono, correo_empresa, rubro, vinculo_utec, descripcion_emprendimiento, perfil_investigacion, titulo_investigacion, planteamiento_problema, antecedentes, delimitacion, justificacion, objetivos, metodologia, cronograma, dato_emprendedor, apoyo) 
                VALUES('$id_emprendedor', '$id_asesor', '$nombre_empresa', '$direccion', '$telefono', '$correo_empresa', '$rubro', '$vinculo_utec', '$descripcion_emprendimiento', '$perfil_investigacion', '$titulo_investigacion', '$planteamiento_problema', '$antecedentes', '$delimitacion', '$justificacion', '$objetivos', '$metodologia', '$cronograma', '$datos_integrantes', '$apoyo')";
            $stmt = $this->db->query($sql);
            if($stmt){
                $sql = "SELECT max(id_formulario) as IdFrm FROM formulario where id_emprendedor = '$id_emprendedor'";
                $stmt = $this->db->query($sql)->fetch_assoc();
                return $stmt;
            }else{
                return "Error";
            }
        } catch (Exception $e) {
            return $e;
        }                       
    }
    
    public function guardar_integrantes($IdFrm,$idE, $idAs, $nombre,$direccion,$telefono,$correo){
        $sql = "INSERT INTO datos_emprendedor(id_formulario, id_emprendedor, id_asesor, nombre_emprendedor, direccion, telefono, correo)
                VALUES('$IdFrm', '$idE', '$idAs', '$nombre','$direccion','$telefono','$correo')";
        $stmt = $this->db->query($sql);
        if($stmt){
            return "Ok";
        }else{
            return "Error";
        }
        
    }

    public function guardar_empresa($id_emprendedor, $id_formulario, $id_asesor, $nombreEmpresa, $rubro){
        $sql ="INSERT INTO empresas(id_emprendedor, id_formulario, id_asesor, nombre_empresa, rubro)
                VALUES('$id_emprendedor','$id_formulario', ' $id_asesor', '$nombreEmpresa', '$rubro')";
        $stmt = $this->db->query($sql);
        if($stmt){
            return "Ok";
        }else{
            return "Error";
        }
    }

    public function idAsesor()
    {
        $idE=$_SESSION['id'];
        $sql = "SELECT id_asesor as id_asesor FROM emprendedor where id_emprendedor='$idE'";
        $stmt = $this->db->query($sql)->fetch_assoc();
        if($stmt){
            return $stmt["id_asesor"];
        }else{
            return "Error";
        }
    }

}

?>