<?php 

class conectar{
    public static function conexion(){
        $conexion = new mysqli("localhost", "root", "", "gnius");
        if($conexion)
        {
            return $conexion;
        }
        else
        {
            return "Error: ".mysqli_connect_error();
        }
        
    }

}


?>